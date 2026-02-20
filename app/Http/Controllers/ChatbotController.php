<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        $question = strtolower(trim($request->input('question', '')));
        $answer = $this->getAnswer($question);
        return response()->json(['answer' => $answer]);
    }

    private function getAnswer(string $question): string
    {
        // Nhận diện các câu hỏi về mẫu xe phổ biến
        if (
            strpos($question, 'mẫu xe phổ biến') !== false ||
            strpos($question, 'gợi ý xe') !== false ||
            strpos($question, 'gợi ý mẫu xe') !== false ||
            strpos($question, 'gợi ý mẫu xe phổ biến') !== false ||
            strpos($question, 'các mẫu xe phổ biến') !== false ||
            strpos($question, 'xe nào phổ biến') !== false ||
            strpos($question, 'xe phổ biến') !== false
        ) {
            $products = product::where('is_active', true)->pluck('name')->take(10)->toArray();
            if (count($products) > 0) {
                return 'Các mẫu xe phổ biến hiện nay:\n' . implode(', ', $products) . '.';
            } else {
                return 'Hiện tại chưa có mẫu xe nào trong hệ thống.';
            }
        }

        // Nhận diện các câu hỏi về giá xe
        if (strpos($question, 'giá xe') !== false) {
            return 'Bạn muốn hỏi giá xe nào? Vui lòng cung cấp tên xe để mình hỗ trợ.';
        }

        // Nhận diện các câu hỏi về liên hệ
        if (strpos($question, 'liên hệ') !== false) {
            return 'Bạn có thể liên hệ với chúng tôi qua số điện thoại 0123-456-789 hoặc email support@projectcar.com.';
        }

        // Câu trả lời mặc định
        return 'Xin lỗi, mình chưa hiểu câu hỏi của bạn. Bạn có thể hỏi về các mẫu xe, giá xe, hoặc liên hệ.';
    }
}
