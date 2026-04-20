<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Collection;

class ProductSearchService
{
    /**
     * Tìm kiếm sản phẩm (xe) dựa trên câu hỏi
     * Ưu tiên các xe khớp với keyword trong câu hỏi
     */
    public function searchByQuestion(string $question, int $limit = 10): Collection
    {
        $question = trim(mb_strtolower($question));
        if ($question === '') {
            return collect();
        }

        $keywords = $this->extractKeywords($question);
        
        $query = product::query()
            ->where('is_active', true)
            ->select([
                'id', 'name', 'subtitle', 'category', 'description',
                'price_vnd', 'price_display', 'power', 'torque_nm',
                'acceleration_sec', 'top_speed_kmh', 'consumption_l_per_100km',
                'power_ps', 'power_kw', 'length_mm', 'height_mm'
            ]);

        // Nếu câu hỏi chứa "718", tìm xe 718 trước
        if (str_contains($question, '718') || str_contains($question, 'bảy một tám')) {
            $query->where('name', 'like', '%718%');
        } elseif (str_contains($question, '911') || str_contains($question, 'chín một một')) {
            $query->where('name', 'like', '%911%');
        } elseif (str_contains($question, 'taycan')) {
            $query->where('name', 'like', '%Taycan%');
        } elseif (str_contains($question, 'panamera')) {
            $query->where('name', 'like', '%Panamera%');
        } elseif (str_contains($question, 'macan')) {
            $query->where('name', 'like', '%Macan%');
        } elseif (str_contains($question, 'cayenne')) {
            $query->where('name', 'like', '%Cayenne%');
        } else {
            // Tìm kiếm theo keyword
            if (!empty($keywords)) {
                $query->where(function ($builder) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $builder->orWhere('name', 'like', '%' . $keyword . '%')
                            ->orWhere('category', 'like', '%' . $keyword . '%')
                            ->orWhere('description', 'like', '%' . $keyword . '%');
                    }
                });
            }
        }

        return $query->limit($limit)->get();
    }

    /**
     * Lấy tất cả xe theo dòng xe
     */
    public function getByCategory(string $category, int $limit = 10): Collection
    {
        return product::query()
            ->where('is_active', true)
            ->where('name', 'like', '%' . $category . '%')
            ->select([
                'id', 'name', 'subtitle', 'category', 'price_display',
                'power_ps', 'torque_nm', 'acceleration_sec', 'top_speed_kmh'
            ])
            ->limit($limit)
            ->get();
    }

    /**
     * Chuyển collection sản phẩm thành context text cho Gemini
     */
    public function formatAsContext(Collection $products, int $maxChars = 5000): string
    {
        if ($products->isEmpty()) {
            return '';
        }

        $context = "Danh sách xe Porsche tương ứng:\n\n";
        $charCount = 0;

        foreach ($products as $product) {
            $specs = "- {$product->name}";
            if ($product->subtitle) {
                $specs .= " ({$product->subtitle})";
            }
            $specs .= "\n";

            if ($product->price_display) {
                $specs .= "  Giá: {$product->price_display}\n";
            }

            if ($product->power_ps) {
                $specs .= "  Công suất: {$product->power_ps} PS";
                if ($product->power_kw) {
                    $specs .= " ({$product->power_kw} kW)";
                }
                $specs .= "\n";
            }

            if ($product->torque_nm) {
                $specs .= "  Mô-men xoắn: {$product->torque_nm} Nm\n";
            }

            if ($product->acceleration_sec) {
                $specs .= "  Tăng tốc 0-100 km/h: {$product->acceleration_sec}s\n";
            }

            if ($product->top_speed_kmh) {
                $specs .= "  Tốc độ tối đa: {$product->top_speed_kmh} km/h\n";
            }

            if ($product->consumption_l_per_100km) {
                $specs .= "  Mức tiêu thụ: {$product->consumption_l_per_100km} L/100km\n";
            }

            $specs .= "\n";

            if ($charCount + strlen($specs) > $maxChars) {
                break;
            }

            $context .= $specs;
            $charCount += strlen($specs);
        }

        return $context;
    }

    /**
     * Extract keywords từ câu hỏi (bỏ các stop words)
     */
    private function extractKeywords(string $question): array
    {
        $parts = preg_split('/[^\p{L}\p{N}]+/u', $question, -1, PREG_SPLIT_NO_EMPTY);
        if ($parts === false) {
            return [];
        }

        $stopWords = [
            'la', 'là', 'va', 'và', 'cho', 'toi', 'tôi', 'co', 'có', 'the', 'thể', 'nao', 'nào',
            'bao', 'nhiêu', 'nhieu', 'gi', 'gì', 'cua', 'của', 'o', 'ở', 'tai', 'tại', 'voi', 'với',
            'for', 'the', 'is', 'are', 'a', 'an', 'to', 'and', 'or', 'loai', 'loại', 'phien', 'phiên',
            'ban', 'bản', 'nam', 'năm', 'dong', 'dòng', 'kieu', 'kiểu', 'model', 'xe', 'xe', 'da', 'đã'
        ];

        $keywords = array_filter($parts, function ($word) use ($stopWords) {
            return mb_strlen($word) > 1 && !in_array(mb_strtolower($word), $stopWords, true);
        });

        return array_values(array_unique($keywords));
    }
}
