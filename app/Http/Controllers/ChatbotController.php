<?php

namespace App\Http\Controllers;

use App\Services\AiChatService;
use App\Services\ChatContextBuilderService;
use App\Services\KnowledgeSearchService;
use App\Services\ProductSearchService;
use App\Models\KnowledgeItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    private const FALLBACK_MESSAGE = 'Xin lỗi, hiện tại tôi chưa đủ dữ liệu để trả lời chính xác. Bạn có thể đặt câu hỏi theo cách khác hoặc liên hệ showroom để được hỗ trợ nhanh hơn.';

    private const GREETINGS = [
        'chào' => 'Chào bạn! Tôi là trợ lý bán hàng Porsche. Tôi có thể giúp bạn tìm hiểu về các dòng xe, giá cả, chính sách bảo hành, và các dịch vụ của Porsche. Hỏi tôi bất cứ điều gì!',
        'xin chào' => 'Xin chào! Mình là trợ lý Porsche. Rất vui được giúp bạn tìm hiểu về các sản phẩm và dịch vụ của chúng tôi. Bạn muốn biết gì?',
        'hi' => 'Hi bạn! 👋 Mình sẵn sàng trợ giúp bạn về Porsche. Có câu hỏi gì không?',
        'hello' => 'Chào bạn! Mình là trợ lý bán hàng Porsche. Bạn hỏi mình đi!',
        'cảm ơn' => 'Không có gì! Mình rất vui được giúp bạn. Nếu bạn còn câu hỏi nào khác, cứ hỏi mình nhé!',
        'thanks' => 'Cảm ơn bạn! Nếu còn cần giúp đỡ gì, hãy liên hệ mình!',
        'tạm biệt' => 'Tạm biệt! Cảm ơn bạn đã tương tác với mình. Chúc bạn có ngày tốt lành! 😊',
        'bye' => 'Bye bạn! Cảm ơn đã ghé thăm. Hẹn gặp lại!',
        'ok' => 'Được rồi! Có gì khác tôi có thể giúp không?',
        'được' => 'Tốt! Bạn còn câu hỏi nào khác không?',
    ];

    public function __construct(
        private readonly KnowledgeSearchService $searchService,
        private readonly ProductSearchService $productSearchService,
        private readonly ChatContextBuilderService $contextBuilder,
        private readonly AiChatService $aiChatService
    ) {
    }
    public function handle(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:500'],
        ]);

        $question = trim($validated['question']);

        // 0) Phát hiện greeting - trả lời local ngay, không tốn API call
        $greetingResponse = $this->getGreetingResponse($question);
        if ($greetingResponse !== null) {
            return response()->json([
                'answer' => $greetingResponse,
                'sources' => [],
            ]);
        }

        // 0.5) Kiểm tra câu hỏi có liên quan xe/Porsche không
        if (!$this->isRelevantQuestion($question)) {
            return response()->json([
                'answer' => 'Tôi là trợ lý ảo của Porsche. Tôi chỉ có thể trợ giúp về các dòng xe Porsche, giá cả, bảo hành, showroom, v.v. Có câu hỏi gì về Porsche không?',
                'sources' => [],
            ]);
        }

        // 1) Tìm kiếm sản phẩm xe trước (chính xác cao hơn)
        $products = $this->productSearchService->searchByQuestion($question, 10);
        
        // 2) Nếu không tìm thấy sản phẩm, tìm kiếm trong knowledge base
        $items = collect();
        $productContext = '';
        
        if ($products->isNotEmpty()) {
            // Sử dụng dữ liệu sản phẩm xe
            $productContext = $this->productSearchService->formatAsContext($products, 4000);
        } else {
            // Tìm kiếm trong knowledge base
            $items = $this->searchService->search($question, 8);
            
            // Nếu vẫn không match, nạp dữ liệu tổng quan
            if ($items->isEmpty()) {
                $items = KnowledgeItem::query()
                    ->select(['id', 'title', 'content', 'tags', 'source', 'updated_at'])
                    ->where('is_active', true)
                    ->orderByDesc('updated_at')
                    ->limit(8)
                    ->get();
            }
        }

        // Xây dựng context từ knowledge items
        $knowledgeContext = $this->contextBuilder->build($items, 3000);
        
        // Kết hợp cả hai context
        $context = $productContext . $knowledgeContext;

        // 3) Thử gọi Gemini trước, nếu fail thì fallback to local answer.
        if ($this->aiChatService->isConfigured()) {
            $answer = $context !== ''
                ? $this->aiChatService->ask($question, $context)
                : $this->aiChatService->askGeneralAdvice($question);

            if ($answer !== null && trim($answer) !== '') {
                return response()->json([
                    'answer' => $answer,
                    'sources' => [],
                ]);
            }

            // Gemini failed - try local fallback answer from products or knowledge items
            if ($products->isNotEmpty()) {
                // Try to build answer from product data
                $fallbackAnswer = $this->buildProductFallbackAnswer($products, $question);
                if ($fallbackAnswer) {
                    return response()->json([
                        'answer' => $fallbackAnswer,
                        'sources' => [],
                    ]);
                }
            }
            
            if (!$items->isEmpty()) {
                $fallbackAnswer = $this->contextBuilder->buildLocalAnswer($items);
                if ($fallbackAnswer) {
                    return response()->json([
                        'answer' => $fallbackAnswer,
                        'sources' => [],
                    ]);
                }
            }

            // Have data but AI is unreliable - return structured fallback
            // Check if it's a price question
            $isPriceQuestion = preg_match('/(gia|giá|bao nhieu|bao nhiêu|price|cost|tien)/i', $question);
            
            if ($isPriceQuestion) {
                return response()->json([
                    'answer' => "Bảng giá tham khảo 2026:\n\n"
                        . "📊 MACAN: từ 3,350 tỷ VND\n"
                        . "📊 718: từ 3,850 tỷ VND\n"
                        . "📊 TAYCAN: từ 4,620 tỷ VND\n"
                        . "📊 CAYENNE: từ 5,560 tỷ VND\n"
                        . "📊 PANAMERA: từ 6,420 tỷ VND\n"
                        . "📊 911: từ 8,870 tỷ VND\n\n"
                        . "Giá có thể thay đổi tùy theo cấu hình, lựng xe, màu sắc và các tùy chọn thêm.\n\n"
                        . "📞 Liên hệ showroom để được tư vấn giá chi tiết:\n"
                        . "Sài Gòn: 028 3911 9111 | Hà Nội: 024 3795 9111",
                    'sources' => [],
                ]);
            }
            
            return response()->json([
                'answer' => 'Hiện tại dịch vụ AI của tôi gặp sự cố tạm thời. Tuy nhiên, tôi vẫn có thể giúp bạn! Hãy gọi trực tiếp showroom để được tư vấn chi tiết:\n\n📞 Showroom Sài Gòn: 028 3911 9111\n📞 Showroom Hà Nội: 024 3795 9111',
                'sources' => [],
            ]);
        }

        // 4) Fallback an toàn khi API không được cấu hình.
        if (!$items->isEmpty()) {
            $localAnswer = $this->contextBuilder->buildLocalAnswer($items);

            return response()->json([
                'answer' => $localAnswer ?: self::FALLBACK_MESSAGE,
                'sources' => [],
            ]);
        }

        return response()->json([
            'answer' => self::FALLBACK_MESSAGE,
            'sources' => [],
        ]);
    }
    /**
     * Kiểm tra câu hỏi có liên quan đến Porsche/xe không
     */
    private function isRelevantQuestion(string $question): bool
    {
        // Keywords liên quan Porsche
        $relevantKeywords = [
            'porsche', 'xe', 'ôtô', 'oto', 'car', 'vehicle', 'giá', 'gia', 'price',
            '911', '718', 'taycan', 'macan', 'panamera', 'cayenne', 'boxster', 'cayman', 'spyder',
            'showroom', 'lái thử', 'lai thu', 'test drive', 'bảo hành', 'bao hanh', 'warranty',
            'bảo dưỡng', 'bao duong', 'maintenance', 'tài chính', 'tai chinh', 'financing',
            'trả góp', 'tra gop', 'động cơ', 'dong co', 'engine', 'công suất', 'cong suat',
            'tốc độ', 'toc do', 'speed', 'km', 'khm', 'màu', 'mau', 'color', 'nội thất', 'noi that',
            'interior', 'ngoài thất', 'ngoai that', 'exterior', 'tư vấn', 'tu van',
            'hỗ trợ', 'ho tro', 'support', 'liên hệ', 'lien he', 'contact',
            'quảng cáo', 'quang cao', 'khuyến mãi', 'khuyen mai', 'khuyến mại', 'khuyen mai',
        ];

        $lowerQuestion = strtolower($question);
        
        // Kiểm tra nếu câu hỏi chứa bất kỳ keyword liên quan
        foreach ($relevantKeywords as $keyword) {
            if (strpos($lowerQuestion, $keyword) !== false) {
                return true;
            }
        }
        
        return false;
    }
    /**
     * Kiểm tra xem câu hỏi có phải greeting không - match ở bất kỳ vị trí
     */
    private function isGreeting(string $question): bool
    {
        $normalized = strtolower(trim($question));
        
        foreach (array_keys(self::GREETINGS) as $greeting) {
            // Match toàn bộ câu, từ đầu, hoặc từ bất kỳ vị trí nào
            if ($normalized === $greeting || 
                preg_match('/^' . preg_quote($greeting) . '(\s|$|,|!|\?)/i', $question) ||
                preg_match('/(\s|^)' . preg_quote($greeting) . '(\s|,|!|\?|$)/i', $question)) {
                return true;
            }
        }  
        return false;
    }
    /**
     * Lấy response cho greeting, return null nếu không phải greeting
     */
    private function getGreetingResponse(string $question): ?string
    {
        if (!$this->isGreeting($question)) {
            return null;
        }
        $normalized = strtolower(trim($question));
        // Match theo thứ tự ưu tiên - toàn bộ câu hoặc từ bất kỳ vị trí nào
        foreach (self::GREETINGS as $greeting => $response) {
            if ($normalized === $greeting || 
                preg_match('/^' . preg_quote($greeting) . '(\s|$|,|!|\?)/i', $question) ||
                preg_match('/(\s|^)' . preg_quote($greeting) . '(\s|,|!|\?|$)/i', $question)) {
                return $response;
            }
        }
        return null;
    }

    /**
     * Build fallback answer from products when API fails
     */
    private function buildProductFallbackAnswer($products, string $question): ?string
    {
        if ($products->isEmpty()) {
            return null;
        }

        // Check if question is about price
        $isPriceQuestion = preg_match('/(gia|giá|bao nhieu|bao nhiêu|price|cost|tien)/i', $question);

        if ($isPriceQuestion) {
            // Return price list for price-related questions
            return "Bảng giá tham khảo 2026:\n\n"
                . "📊 MACAN: từ 3,350 tỷ VND\n"
                . "📊 718: từ 3,850 tỷ VND\n"
                . "📊 TAYCAN: từ 4,620 tỷ VND\n"
                . "📊 CAYENNE: từ 5,560 tỷ VND\n"
                . "📊 PANAMERA: từ 6,420 tỷ VND\n"
                . "📊 911: từ 8,870 tỷ VND\n\n"
                . "Giá có thể thay đổi tùy theo cấu hình, lựng xe, màu sắc và các tùy chọn thêm.\n\n"
                . "📞 Liên hệ showroom để được tư vấn giá chi tiết:\n"
                . "Sài Gòn: 028 3911 9111 | Hà Nội: 024 3795 9111";
        }

        // For non-price questions, suggest the first matching product
        $first = $products->first();
        $name = $first->name ?? 'xe';
        
        $answer = "Dựa trên câu hỏi của bạn, tôi gợi ý mẫu {$name}.\n\n"
            . "Để tìm hiểu chi tiết hoặc đặt lịch lái thử, vui lòng liên hệ:\n\n"
            . "📞 Showroom Sài Gòn: 028 3911 9111\n"
            . "📞 Showroom Hà Nội: 024 3795 9111";
        
        return $answer;
    }
}