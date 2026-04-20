<?php

namespace App\Services;

use App\Models\KnowledgeItem;
use Illuminate\Support\Collection;

class KnowledgeSearchService
{
    public function search(string $question, int $limit = 5): Collection
    {
        $question = trim($question);
        if ($question === '') {
            return collect();
        }

        $keywords = $this->extractKeywords($question);

        $query = KnowledgeItem::query()
            ->select(['id', 'title', 'content', 'tags', 'source', 'updated_at'])
            ->where('is_active', true)
            ->where(function ($builder) use ($question, $keywords) {
                // Exact phrase match has highest priority
                $builder->where('title', 'like', '%' . $question . '%')
                    ->orWhere('content', 'like', '%' . $question . '%')
                    ->orWhere('tags', 'like', '%' . $question . '%');

                // Keyword matches as secondary
                foreach ($keywords as $keyword) {
                    $builder->orWhere('title', 'like', '%' . $keyword . '%')
                        ->orWhere('content', 'like', '%' . $keyword . '%')
                        ->orWhere('tags', 'like', '%' . $keyword . '%');
                }
            })
            ->limit(20)
            ->get();

        $results = $query
            ->map(function ($item) use ($question, $keywords) {
                $item->relevance = $this->scoreItem($item->title, $item->content, $item->tags, $question, $keywords);
                return $item;
            })
            ->sortByDesc('relevance')
            ->filter(function ($item) {
                // Filter out items with very low relevance to avoid noise
                return $item->relevance >= 5;
            })
            ->take($limit)
            ->values();

        return $results;
    }

    private function extractKeywords(string $question): array
    {
        $parts = preg_split('/[^\p{L}\p{N}]+/u', mb_strtolower($question), -1, PREG_SPLIT_NO_EMPTY);
        if ($parts === false) {
            return [];
        }

        $stopWords = [
            'la', 'là', 'va', 'và', 'cho', 'toi', 'tôi', 'co', 'có', 'the', 'thể', 'nao', 'nào',
            'bao', 'nhiêu', 'nhieu', 'gi', 'gì', 'cua', 'của', 'o', 'ở', 'tai', 'tại', 'voi', 'với',
            'for', 'the', 'is', 'are', 'a', 'an', 'to', 'and', 'or',
        ];

        $keywords = array_filter($parts, function ($word) use ($stopWords) {
            return mb_strlen($word) > 1 && !in_array($word, $stopWords, true);
        });

        return array_values(array_unique($keywords));
    }

    private function scoreItem(string $title, string $content, ?string $tags, string $question, array $keywords): int
    {
        $score = 0;

        $titleLower = mb_strtolower($title);
        $contentLower = mb_strtolower($content);
        $tagsLower = mb_strtolower((string) $tags);
        $questionLower = mb_strtolower($question);

        // Exact phrase match gets high score
        if (str_contains($titleLower, $questionLower)) {
            $score += 100;
        }
        if (str_contains($contentLower, $questionLower)) {
            $score += 50;
        }
        if ($tagsLower !== '' && str_contains($tagsLower, $questionLower)) {
            $score += 40;
        }

        // Keyword matches give incremental score
        $matchedKeywords = 0;
        foreach ($keywords as $keyword) {
            $matched = false;
            if (str_contains($titleLower, $keyword)) {
                $score += 20;
                $matched = true;
            }
            if (str_contains($contentLower, $keyword)) {
                $score += 10;
                $matched = true;
            }
            if ($tagsLower !== '' && str_contains($tagsLower, $keyword)) {
                $score += 8;
                $matched = true;
            }
            if ($matched) {
                $matchedKeywords++;
            }
        }

        // Bonus for matching multiple keywords (indicates relevance)
        if ($matchedKeywords >= 2) {
            $score += 10;
        }

        return $score;
    }
}
