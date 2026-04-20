<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ChatContextBuilderService
{
    public function build(Collection $items, int $maxChars = 5000): string
    {
        if ($items->isEmpty()) {
            return '';
        }

        $chunks = [];
        $currentLength = 0;

        foreach ($items as $index => $item) {
            $content = trim((string) $item->content);
            if ($content === '') {
                continue;
            }

            if (mb_strlen($content) > 1000) {
                $content = mb_substr($content, 0, 1000) . '...';
            }

            $block = "[Knowledge #" . ($index + 1) . "]\n"
                . "Title: " . trim((string) $item->title) . "\n"
                . "Content: " . $content . "\n"
                . "Tags: " . trim((string) $item->tags) . "\n"
                . "Source: " . trim((string) $item->source) . "\n";

            $nextLength = $currentLength + mb_strlen($block) + 2;
            if ($nextLength > $maxChars) {
                break;
            }

            $chunks[] = $block;
            $currentLength = $nextLength;
        }

        return trim(implode("\n", $chunks));
    }

    public function buildLocalAnswer(Collection $items): ?string
    {
        $first = $items->first();
        if (!$first) {
            return null;
        }

        $content = trim((string) $first->content);
        if ($content === '') {
            return null;
        }

        $source = trim((string) $first->source);
        return $this->composeFriendlyLocalAnswer($source, $content);
    }

    private function composeFriendlyLocalAnswer(string $source, string $fallbackContent): string
    {
        return match ($source) {
            'showroom.hanoi' => 'Tại Hà Nội, bạn có thể đến Porsche Centre Hà Nội ở 2 Nguyễn Văn Huyên, Cầu Giấy (hotline 024 3795 9111, giờ làm việc 8:00 - 18:00) hoặc Porsche Studio Hà Nội tại Lotte, 54 Liễu Giai, Ba Đình (hotline 024 3200 9111, giờ làm việc 9:00 - 21:00).',
            'showroom.saigon' => 'Tại TP.HCM, bạn có thể đến Porsche Centre Sài Gòn ở 2 Bis Nguyễn Thị Minh Khai, Quận 1. Hotline 028 3911 9111, giờ làm việc 8:00 - 18:00.',
            'policy.warranty' => 'Chính sách bảo hành gồm 3 năm không giới hạn km; riêng pin Taycan là 8 năm hoặc 160.000 km. Nếu cần, mình có thể tư vấn thêm gói gia hạn phù hợp cho bạn.',
            'policy.finance' => 'Bên mình hỗ trợ trả góp tối đa khoảng 85% giá trị xe, thời hạn 12-84 tháng. Bạn muốn mình gợi ý phương án trả góp theo ngân sách của bạn không?',
            'catalog.price' => 'Giá tham khảo hiện tại: Macan từ 3,350 tỷ, 718 từ 3,850 tỷ, Taycan từ 4,620 tỷ, Cayenne từ 5,560 tỷ, Panamera từ 6,420 tỷ và 911 từ 8,870 tỷ VND.',
            'catalog.718' => 'Porsche 718 có ba phiên bản chính:\n• Cayman (coupé 2 cửa) - giá từ 3,850 tỷ - động cơ 4 xi-lanh 2.0/2.5L, công suất 300-365 hp\n• Boxster (mui trần) - giá từ 4,150 tỷ - cùng động cơ nhưng có mái vải điều khiển tự động\n• Spyder (mui trần cao cấp) - giá từ 5,850 tỷ - động cơ 6 xi-lanh boxer 4.0L tự nhiên, 414 hp, trải nghiệm lái siêu tuyệt vời',
            'catalog.718.cayman' => 'Porsche 718 Cayman: Phiên bản coupé 2 cửa cơ bản của dòng 718. Động cơ 4 xi-lanh 2.0L turbo (300 hp) hoặc 2.5L turbo (365 hp, phiên bản S). Tốc độ tối đa 275-285 km/h, 0-100 km/h trong 4.7-5.4 giây. Giá tham khảo từ 3,850 tỷ VND - phiên bản giá rẻ nhất trong dòng 718, lý tưởng cho người vừa bắt đầu yêu thích xe thể thao.',
            'catalog.718.boxster' => 'Porsche 718 Boxster: Phiên bản mui trần (convertible) của dòng 718. Cùng động cơ 4 xi-lanh như Cayman (2.0L hoặc 2.5L turbo). Mái vải điều khiển điện tự động, mở/đóng trong 11 giây. Tốc độ tối đa 275-285 km/h. Giá tham khảo từ 4,150 tỷ VND. Thích hợp để trải nghiệm cảm giác lái trên đường cao tốc và tham gia các chương trình lái xe thể thao.',
            'catalog.718.spyder' => 'Porsche 718 Spyder: Phiên bản cao cấp nhất của dòng 718, mui trần 100% không có cửa ngoài. Đặc biệt được trang bị động cơ 6 xi-lanh boxer 4.0L tự nhiên (không turbo) với công suất 414 hp - âm thanh huyền thoại, động lực tuyệt vời. Tốc độ tối đa 301 km/h, 0-100 km/h trong 3.7 giây. Hệ truyền động cao cấp. Giá tham khảo từ 5,850 tỷ VND - dành cho những người đam mê xe thể thao tối cao và muốn trải nghiệm cực hạn.',
            'catalog.911' => 'Porsche 911 là dòng xe biểu tượng của hãng, thiên về hiệu năng cao và trải nghiệm lái thuần thể thao. Giá tham khảo từ 8,870 tỷ VND.',
            'catalog.taycan' => 'Porsche Taycan là dòng xe điện hiệu năng cao, hỗ trợ công nghệ sạc nhanh 800V. Giá tham khảo từ 4,620 tỷ VND.',
            'catalog.macan' => 'Porsche Macan là SUV cỡ nhỏ, linh hoạt và dễ dùng hằng ngày. Giá tham khảo từ 3,350 tỷ VND.',
            'catalog.cayenne' => 'Porsche Cayenne là SUV cao cấp rộng rãi, phù hợp gia đình và di chuyển đường dài. Giá tham khảo từ 5,560 tỷ VND.',
            'service.maintenance' => 'Bên mình có dịch vụ bảo dưỡng định kỳ với kỹ thuật viên chính hãng và phụ tùng Porsche tiêu chuẩn. Bạn có muốn mình hướng dẫn cách đặt lịch nhanh không?',
            'service.testdrive' => 'Bạn có thể đặt lịch lái thử miễn phí tại showroom. Mình có thể gợi ý mẫu xe phù hợp rồi bạn chọn khung giờ thuận tiện.',
            'policy.payment' => 'Bạn có thể thanh toán một lần hoặc trả góp qua Porsche Financial Services/ngân hàng đối tác. Mình có thể giúp bạn so sánh nhanh từng phương án.',
            default => $fallbackContent,
        };
    }
}
