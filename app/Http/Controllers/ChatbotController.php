<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    // Thông tin showroom
    private $showrooms = [
        'saigon' => [
            'name' => 'Porsche Centre Sài Gòn',
            'address' => '2 Bis Nguyễn Thị Minh Khai, Quận 1, TP.HCM',
            'phone' => '028 3911 9111',
            'hours' => '8:00 - 18:00 (Thứ 2 - Chủ nhật)'
        ],
        'hanoi' => [
            'name' => 'Porsche Centre Hà Nội',
            'address' => '2 Nguyễn Văn Huyên, Cầu Giấy, Hà Nội',
            'phone' => '024 3795 9111',
            'hours' => '8:00 - 18:00 (Thứ 2 - Chủ nhật)'
        ],
        'studio' => [
            'name' => 'Porsche Studio Hà Nội',
            'address' => 'TTTM Lotte, 54 Liễu Giai, Ba Đình, Hà Nội',
            'phone' => '024 3200 9111',
            'hours' => '9:00 - 21:00 (Hàng ngày)'
        ]
    ];

    // Thông tin các dòng xe
    private $carLines = [
        '718' => [
            'name' => '718',
            'price_from' => '3.850.000.000 VND',
            'description' => 'Dòng xe thể thao 2 cửa gọn nhẹ, mạnh mẽ. Động cơ 4 xi-lanh tăng áp, công suất từ 300 - 420 mã lực.',
            'models' => ['718 Cayman', '718 Cayman S', '718 Boxster', '718 Boxster S', '718 Spyder']
        ],
        '911' => [
            'name' => '911',
            'price_from' => '8.870.000.000 VND',
            'description' => 'Biểu tượng huyền thoại của Porsche. Động cơ 6 xi-lanh boxer, thiết kế kinh điển, hiệu suất vượt trội.',
            'models' => ['911 Carrera', '911 Carrera S', '911 Turbo', '911 Turbo S', '911 GT3', '911 GT3 RS']
        ],
        'taycan' => [
            'name' => 'Taycan',
            'price_from' => '4.620.000.000 VND',
            'description' => 'Xe điện thể thao đầu tiên của Porsche. Công nghệ 800V, sạc siêu nhanh, công suất lên đến 761 mã lực.',
            'models' => ['Taycan', 'Taycan 4S', 'Taycan Turbo', 'Taycan Turbo S', 'Taycan Cross Turismo']
        ],
        'panamera' => [
            'name' => 'Panamera',
            'price_from' => '6.420.000.000 VND',
            'description' => 'Sedan thể thao hạng sang 4 cửa. Kết hợp hoàn hảo giữa sự sang trọng và hiệu suất thể thao.',
            'models' => ['Panamera', 'Panamera 4', 'Panamera 4S', 'Panamera Turbo', 'Panamera Turbo S E-Hybrid']
        ],
        'macan' => [
            'name' => 'Macan',
            'price_from' => '3.350.000.000 VND',
            'description' => 'SUV compact thể thao. Linh hoạt trong đô thị, mạnh mẽ trên mọi địa hình.',
            'models' => ['Macan', 'Macan S', 'Macan GTS', 'Macan Turbo']
        ],
        'cayenne' => [
            'name' => 'Cayenne',
            'price_from' => '5.560.000.000 VND',
            'description' => 'SUV cao cấp, rộng rãi và đa năng. Sự kết hợp giữa tiện nghi gia đình và DNA thể thao Porsche.',
            'models' => ['Cayenne', 'Cayenne S', 'Cayenne E-Hybrid', 'Cayenne Turbo', 'Cayenne Turbo S E-Hybrid', 'Cayenne Coupé']
        ]
    ];

    // Chào hỏi ngẫu nhiên
    private $greetings = [
        'Xin chào! Tôi là trợ lý ảo của Porsche Việt Nam. Rất vui được hỗ trợ bạn hôm nay!',
        'Chào bạn! Tôi là nhân viên tư vấn Porsche. Bạn cần tôi hỗ trợ gì ạ?',
        'Xin chào quý khách! Cảm ơn bạn đã quan tâm đến Porsche. Tôi có thể giúp gì cho bạn?'
    ];

    public function handle(Request $request): JsonResponse
    {
        $question = strtolower(trim($request->input('question', '')));
        $answer = $this->getAnswer($question);
        return response()->json(['answer' => $answer]);
    }

    private function getAnswer(string $question): string
    {
        // Chào hỏi
        if ($this->matchKeywords($question, ['xin chào', 'hello', 'hi', 'chào', 'hey', 'alo', 'chào bạn'])) {
            return $this->greetings[array_rand($this->greetings)];
        }

        // Cảm ơn
        if ($this->matchKeywords($question, ['cảm ơn', 'thanks', 'thank you', 'cám ơn', 'tks'])) {
            return 'Không có gì ạ! Rất vui được hỗ trợ bạn. Nếu cần thêm thông tin, đừng ngại liên hệ với chúng tôi nhé!';
        }

        // Tạm biệt
        if ($this->matchKeywords($question, ['tạm biệt', 'bye', 'goodbye', 'bai', 'tạm biệt nhé'])) {
            return 'Tạm biệt bạn! Chúc bạn một ngày tốt lành. Hẹn gặp lại tại Porsche! 🏎️';
        }

        // Hỏi về chatbot
        if ($this->matchKeywords($question, ['bạn là ai', 'bạn tên gì', 'ai đang nói', 'bạn là gì'])) {
            return 'Tôi là trợ lý ảo của Porsche Việt Nam. Tôi có thể giúp bạn tìm hiểu về các dòng xe, giá xe, showroom và dịch vụ của Porsche.';
        }

        // Hỏi về khuyến mãi / ưu đãi
        if ($this->matchKeywords($question, ['khuyến mãi', 'ưu đãi', 'giảm giá', 'promotion', 'sale', 'khuyến mại'])) {
            return "Hiện tại Porsche có các chương trình ưu đãi đặc biệt:\n\n• Ưu đãi lãi suất 0% trong 12 tháng đầu\n• Bảo hiểm vật chất 1 năm miễn phí\n• Gói bảo dưỡng Porsche Service Plus\n\nĐể biết chi tiết các ưu đãi mới nhất, bạn vui lòng liên hệ showroom để được tư vấn cụ thể ạ!";
        }

        // Hỏi về bảo hành
        if ($this->matchKeywords($question, ['bảo hành', 'warranty', 'bảo hiểm'])) {
            return "Chính sách bảo hành Porsche:\n\n• Bảo hành chính hãng: 3 năm không giới hạn km\n• Bảo hành pin (Taycan): 8 năm hoặc 160.000 km\n• Bảo hành sơn: 3 năm\n• Bảo hành chống ăn mòn: 12 năm\n\nBạn cần tôi tư vấn thêm về gói bảo hành mở rộng không ạ?";
        }

        // Hỏi về bảo dưỡng
        if ($this->matchKeywords($question, ['bảo dưỡng', 'bảo trì', 'service', 'sửa chữa', 'maintenance'])) {
            return "Dịch vụ bảo dưỡng tại Porsche:\n\n• Bảo dưỡng định kỳ theo khuyến cáo của hãng\n• Trung tâm dịch vụ đạt chuẩn toàn cầu\n• Kỹ thuật viên được đào tạo tại Đức\n• Phụ tùng chính hãng 100%\n\nBạn có thể đặt lịch bảo dưỡng qua hotline hoặc trực tiếp tại showroom ạ.";
        }

        // Hỏi về trả góp / tài chính
        if ($this->matchKeywords($question, ['trả góp', 'vay', 'tài chính', 'financing', 'ngân hàng', 'credit'])) {
            return "Porsche Financial Services hỗ trợ:\n\n• Tài trợ lên đến 85% giá trị xe\n• Thời hạn vay: 12 - 84 tháng\n• Lãi suất cạnh tranh từ 7.5%/năm\n• Thủ tục nhanh gọn, duyệt trong 24h\n\nBạn muốn tôi gửi thông tin chi tiết qua email không ạ?";
        }

        // Hỏi về test drive / lái thử
        if ($this->matchKeywords($question, ['lái thử', 'test drive', 'trải nghiệm', 'thử xe'])) {
            return "Đặt lịch lái thử tại Porsche:\n\nBạn có thể đặt lịch lái thử bất kỳ mẫu xe nào tại showroom:\n\n• Porsche Centre Sài Gòn: 028 3911 9111\n• Porsche Centre Hà Nội: 024 3795 9111\n\nChúng tôi sẽ chuẩn bị xe và sắp xếp chuyên viên tư vấn đồng hành cùng bạn!";
        }

        // Hỏi về showroom / đại lý
        if ($this->matchKeywords($question, ['showroom', 'đại lý', 'cửa hàng', 'địa chỉ', 'trung tâm', 'dealer'])) {
            return $this->getShowroomInfo();
        }

        // Hỏi về showroom Sài Gòn
        if ($this->matchKeywords($question, ['sài gòn', 'saigon', 'hcm', 'hồ chí minh', 'tphcm', 'sg'])) {
            $info = $this->showrooms['saigon'];
            return "📍 {$info['name']}\n\n• Địa chỉ: {$info['address']}\n• Hotline: {$info['phone']}\n• Giờ làm việc: {$info['hours']}\n\nBạn muốn đặt lịch hẹn không ạ?";
        }

        // Hỏi về showroom Hà Nội
        if ($this->matchKeywords($question, ['hà nội', 'hanoi', 'hn'])) {
            $info = $this->showrooms['hanoi'];
            $studio = $this->showrooms['studio'];
            return "📍 {$info['name']}\n• Địa chỉ: {$info['address']}\n• Hotline: {$info['phone']}\n• Giờ làm việc: {$info['hours']}\n\n📍 {$studio['name']}\n• Địa chỉ: {$studio['address']}\n• Hotline: {$studio['phone']}\n• Giờ làm việc: {$studio['hours']}";
        }

        // Hỏi về giá xe cụ thể hoặc dòng xe
        foreach ($this->carLines as $key => $car) {
            if ($this->matchKeywords($question, [$key, strtolower($car['name'])])) {
                return $this->getCarInfo($car);
            }
        }

        // Hỏi về xe thể thao
        if ($this->matchKeywords($question, ['xe thể thao', 'sports car', 'xe đua', 'xe 2 cửa'])) {
            return "Porsche tự hào với các dòng xe thể thao huyền thoại:\n\n🏎️ 718 - Từ 3.850 tỷ VND\nXe thể thao 2 cửa gọn nhẹ, lý tưởng cho người yêu tốc độ.\n\n🏎️ 911 - Từ 8.870 tỷ VND\nBiểu tượng bất hủ của Porsche, thiết kế kinh điển.\n\nBạn muốn tìm hiểu chi tiết dòng xe nào ạ?";
        }

        // Hỏi về xe điện
        if ($this->matchKeywords($question, ['xe điện', 'electric', 'ev', 'điện'])) {
            $taycan = $this->carLines['taycan'];
            return "⚡ Porsche Taycan - Xe điện thể thao\n\n• Giá từ: {$taycan['price_from']}\n• {$taycan['description']}\n\nCác phiên bản: " . implode(', ', $taycan['models']) . "\n\nTaycan mang đến trải nghiệm lái điện không thoả hiệp về hiệu suất!";
        }

        // Hỏi về SUV
        if ($this->matchKeywords($question, ['suv', 'xe gầm cao', 'xe gia đình', 'xe 7 chỗ'])) {
            return "Dòng SUV của Porsche:\n\n🚙 Macan - Từ 3.350 tỷ VND\nSUV compact thể thao, linh hoạt trong đô thị.\n\n🚙 Cayenne - Từ 5.560 tỷ VND\nSUV full-size cao cấp, rộng rãi cho gia đình.\n\nBạn quan tâm đến dòng nào ạ?";
        }

        // Hỏi về sedan
        if ($this->matchKeywords($question, ['sedan', 'xe 4 cửa', '4 chỗ'])) {
            $panamera = $this->carLines['panamera'];
            return "🚗 Porsche Panamera - Sedan thể thao hạng sang\n\n• Giá từ: {$panamera['price_from']}\n• {$panamera['description']}\n\nCác phiên bản: " . implode(', ', $panamera['models']);
        }

        // Hỏi về giá xe chung
        if ($this->matchKeywords($question, ['giá xe', 'bảng giá', 'giá bao nhiêu', 'giá tiền', 'price'])) {
            return $this->getPriceList();
        }

        // Hỏi về mẫu xe phổ biến
        if ($this->matchKeywords($question, ['mẫu xe phổ biến', 'gợi ý xe', 'xe nào hay', 'xe bán chạy', 'best seller'])) {
            return $this->getPopularCars();
        }

        // Hỏi về thanh toán
        if ($this->matchKeywords($question, ['thanh toán', 'payment', 'trả tiền', 'chuyển khoản'])) {
            return "Các phương thức thanh toán:\n\n• Thanh toán một lần (chuyển khoản/tiền mặt)\n• Trả góp qua Porsche Financial Services\n• Trả góp qua ngân hàng đối tác\n\nBạn sẽ được tư vấn chi tiết khi đến showroom ạ!";
        }

        // Hỏi về liên hệ
        if ($this->matchKeywords($question, ['liên hệ', 'contact', 'gọi điện', 'hotline', 'số điện thoại', 'email'])) {
            return "📞 Liên hệ Porsche Việt Nam:\n\n• Sài Gòn: 028 3911 9111\n• Hà Nội: 024 3795 9111\n• Email: info@porsche.vn\n• Website: www.porsche.vn\n\nHoặc để lại thông tin, chúng tôi sẽ liên hệ lại bạn ngay!";
        }

        // Hỏi về phụ kiện
        if ($this->matchKeywords($question, ['phụ kiện', 'accessories', 'tequipment', 'đồ chơi xe'])) {
            return "Porsche Tequipment - Phụ kiện chính hãng:\n\n• Bộ vành xe thể thao\n• Hệ thống ống xả sport\n• Nội thất tùy chỉnh cao cấp\n• Phụ kiện ngoại thất carbon\n• Hệ thống giá nóc và hành lý\n\nMọi phụ kiện đều được thiết kế riêng cho từng dòng xe Porsche!";
        }

        // Xe cũ / đã qua sử dụng
        if ($this->matchKeywords($question, ['xe cũ', 'secondhand', 'xe đã qua sử dụng', 'xe cũ approved'])) {
            return "Porsche Approved Pre-owned:\n\nXe cũ chính hãng với tiêu chuẩn kiểm định 111 điểm:\n\n• Bảo hành chính hãng tương đương xe mới\n• Lịch sử xe minh bạch\n• Hỗ trợ tài chính linh hoạt\n• Cam kết chất lượng Porsche\n\nLiên hệ showroom để xem xe có sẵn!";
        }

        // Hỏi về giờ làm việc
        if ($this->matchKeywords($question, ['giờ làm việc', 'mở cửa', 'đóng cửa', 'working hours'])) {
            return "⏰ Giờ làm việc:\n\n• Showroom: 8:00 - 18:00 (Thứ 2 - Chủ nhật)\n• Porsche Studio Hà Nội: 9:00 - 21:00 (Hàng ngày)\n• Hotline hỗ trợ: 24/7\n\nBạn có thể đặt lịch hẹn trước để được phục vụ tốt nhất!";
        }

        // Xe rẻ nhất / giá tốt
        if ($this->matchKeywords($question, ['rẻ nhất', 'giá tốt nhất', 'thấp nhất', 'entry'])) {
            return "Mẫu xe Porsche giá hấp dẫn nhất:\n\n🚙 Macan - Từ 3.350 tỷ VND\nSUV compact thể thao, lựa chọn tuyệt vời để bắt đầu với Porsche!\n\n🏎️ 718 - Từ 3.850 tỷ VND\nXe thể thao 2 cửa thuần chất Porsche.";
        }

        // Xe đắt nhất / cao cấp
        if ($this->matchKeywords($question, ['đắt nhất', 'cao cấp nhất', 'top', 'flagship'])) {
            return "Mẫu xe Porsche cao cấp nhất:\n\n🏎️ 911 Turbo S - Biểu tượng của tốc độ và sức mạnh\n• Công suất: 650 mã lực\n• 0-100 km/h: 2.7 giây\n• Giá từ: 16+ tỷ VND\n\nĐây là đỉnh cao của kỹ thuật Porsche!";
        }

        // Hỏi chung về Porsche
        if ($this->matchKeywords($question, ['porsche là gì', 'về porsche', 'thương hiệu', 'brand'])) {
            return "🏁 Về Porsche:\n\nPorsche AG là thương hiệu xe thể thao hạng sang của Đức, thành lập năm 1931.\n\n• Trụ sở: Stuttgart, Đức\n• Slogan: \"There is no substitute\"\n• Dòng xe huyền thoại: 911\n• Xe điện: Taycan\n\nPorsche Việt Nam là đại lý chính hãng duy nhất tại Việt Nam!";
        }

        // Các câu hỏi khác - trả lời chung
        return "Cảm ơn bạn đã liên hệ! Tôi có thể hỗ trợ bạn về:\n\n• Thông tin các dòng xe Porsche (718, 911, Taycan, Panamera, Macan, Cayenne)\n• Bảng giá xe\n• Showroom & địa chỉ\n• Dịch vụ bảo hành, bảo dưỡng\n• Đặt lịch lái thử\n• Tài chính & trả góp\n\nBạn muốn tìm hiểu về vấn đề nào ạ?";
    }

    private function matchKeywords(string $question, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (strpos($question, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }

    private function getShowroomInfo(): string
    {
        $result = "📍 Hệ thống showroom Porsche Việt Nam:\n\n";
        foreach ($this->showrooms as $key => $info) {
            $result .= "🏢 {$info['name']}\n";
            $result .= "• Địa chỉ: {$info['address']}\n";
            $result .= "• Hotline: {$info['phone']}\n\n";
        }
        $result .= "Bạn muốn đặt lịch hẹn tại showroom nào ạ?";
        return $result;
    }

    private function getCarInfo(array $car): string
    {
        $result = "🚗 Porsche {$car['name']}\n\n";
        $result .= "💰 Giá từ: {$car['price_from']}\n\n";
        $result .= "📝 {$car['description']}\n\n";
        $result .= "📋 Các phiên bản:\n";
        foreach ($car['models'] as $model) {
            $result .= "• {$model}\n";
        }
        $result .= "\nBạn muốn đặt lịch lái thử hoặc tư vấn chi tiết không ạ?";
        return $result;
    }

    private function getPriceList(): string
    {
        $result = "💰 Bảng giá xe Porsche Việt Nam:\n\n";
        foreach ($this->carLines as $car) {
            $result .= "• {$car['name']}: từ {$car['price_from']}\n";
        }
        $result .= "\n* Giá có thể thay đổi theo tùy chọn cấu hình.\nBạn quan tâm đến dòng xe nào ạ?";
        return $result;
    }

    private function getPopularCars(): string
    {
        // Lấy từ database
        $products = product::where('is_active', true)->pluck('name')->take(8)->toArray();

        if (count($products) > 0) {
            $result = "🌟 Các mẫu xe được quan tâm nhiều:\n\n";
            foreach ($products as $index => $name) {
                $result .= ($index + 1) . ". {$name}\n";
            }
            $result .= "\nBạn muốn tìm hiểu chi tiết mẫu nào ạ?";
            return $result;
        }

        return "Các mẫu xe Porsche được yêu thích nhất:\n\n• 911 Carrera - Huyền thoại thể thao\n• Cayenne - SUV cao cấp\n• Macan - SUV đô thị\n• Taycan - Xe điện tương lai\n\nBạn muốn tìm hiểu thêm về mẫu nào ạ?";
    }
}
