<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class AiChatService
{
    private const MAX_RETRIES = 2;
    private const RETRY_DELAY_MS = 1000;

    public function isConfigured(): bool
    {
        $apiKey = (string) config('services.gemini.api_key');
        $model = (string) config('services.gemini.model');
        $endpoint = (string) config('services.gemini.endpoint');

        return $apiKey !== '' && $model !== '' && $endpoint !== '';
    }

    public function ask(string $question, string $context): ?string
    {
        $apiKey = (string) config('services.gemini.api_key');
        $model = (string) config('services.gemini.model');
        $endpoint = (string) config('services.gemini.endpoint');
        $temperature = (float) config('services.gemini.temperature', 0.2);

        if (!$this->isConfigured()) {
            return null;
        }

        $systemPrompt = "Bạn là một cố vấn bán hàng Porsche chuyên nghiệp, thân thiện và am hiểu. "
            . "Dựa vào các thông tin được cung cấp, hãy trả lời câu hỏi của khách hàng một cách tự nhiên, chính xác và hữu ích. "
            . "Nếu khách hỏi về GIÁ XE hoặc BẢNG GIÁ: Cung cấp giá chính xác từ thông tin tham khảo, không gợi ý vô căn cứ. "
            . "Hãy gợi ý, khuyên bảo, và khuyến khích khách hàng liên hệ showroom để tư vấn chi tiết và cấu hình xe. "
            . "Tránh trả lời về những thông tin ngoài các tài liệu được cung cấp.";

        $userPrompt = "Khách hỏi: {$question}\n\nThông tin tham khảo:\n{$context}";

        return $this->callGeminiWithRetry($systemPrompt, $userPrompt, $apiKey, $model, $endpoint, $temperature);
    }

    public function askGeneralAdvice(string $question): ?string
    {
        $apiKey = (string) config('services.gemini.api_key');
        $model = (string) config('services.gemini.model');
        $endpoint = (string) config('services.gemini.endpoint');
        $temperature = (float) config('services.gemini.temperature', 0.2);

        if (!$this->isConfigured()) {
            return null;
        }

        $systemPrompt = "Bạn là một chuyên gia tư vấn bán hàng Porsche am hiểu thương hiệu. "
            . "Trả lời câu hỏi của khách hàng một cách tự nhiên, chuyên nghiệp và hữu ích. "
            . "Khi không chắc chắn về chi tiết cụ thể, gợi ý khách liên hệ showroom. "
            . "Giữ câu trả lời ngắn gọn và trực tiếp.";

        $userPrompt = $question;

        return $this->callGeminiWithRetry($systemPrompt, $userPrompt, $apiKey, $model, $endpoint, $temperature);
    }

    private function callGeminiWithRetry(string $system, string $user, string $apiKey, string $model, string $endpoint, float $temperature): ?string
    {
        $lastException = null;

        for ($attempt = 0; $attempt <= self::MAX_RETRIES; $attempt++) {
            try {
                $fullPrompt = "{$system}\n\n{$user}";

                $url = "{$endpoint}/{$model}:generateContent?key={$apiKey}";

                Log::debug('Chatbot Gemini API call', [
                    'url' => $url,
                    'attempt' => $attempt + 1,
                    'model' => $model,
                ]);

                $response = Http::timeout(30)
                    ->contentType('application/json')
                    ->post($url, [
                        'contents' => [
                            [
                                'role' => 'user',
                                'parts' => [
                                    ['text' => $fullPrompt]
                                ]
                            ]
                        ],
                        'generationConfig' => [
                            'temperature' => $temperature,
                            'maxOutputTokens' => 1024,
                        ]
                    ]);

                Log::debug('Chatbot Gemini API response', [
                    'status' => $response->status(),
                    'attempt' => $attempt + 1,
                ]);

                // Success response
                if ($response->ok()) {
                    $jsonData = $response->json();
                    
                    // Validate response structure
                    if (!isset($jsonData['candidates'][0]['content']['parts'][0]['text'])) {
                        Log::warning('Chatbot Gemini API response missing expected structure', [
                            'response' => json_encode($jsonData),
                        ]);
                        return null;
                    }
                    
                    $answer = $jsonData['candidates'][0]['content']['parts'][0]['text'];
                    if (is_string($answer) && trim($answer) !== '') {
                        Log::info('Chatbot Gemini API success', ['attempt' => $attempt + 1]);
                        return trim($answer);
                    }
                    
                    Log::warning('Chatbot Gemini API empty response', ['attempt' => $attempt + 1]);
                    return null;
                }

                // Rate limit - retry with exponential backoff
                if ($response->status() === 429) {
                    $retrySeconds = $this->extractRetryDelaySeconds((array) $response->json());
                    Log::warning('Gemini rate limited (429), retrying...', [
                        'attempt' => $attempt + 1,
                        'max_attempts' => self::MAX_RETRIES + 1,
                        'retry_seconds' => $retrySeconds,
                    ]);
                    if ($attempt < self::MAX_RETRIES) {
                        // Use server's suggested delay if available, or exponential backoff
                        if ($retrySeconds > 0) {
                            $sleepMs = min($retrySeconds, 30) * 1000;
                        } else {
                            // Exponential backoff: 1s, 2s, 4s, 8s, 16s
                            $sleepMs = self::RETRY_DELAY_MS * pow(2, $attempt);
                        }
                        usleep($sleepMs * 1000);
                        continue; // Retry
                    }
                }

                // Handle API authentication errors
                if ($response->status() === 401 || $response->status() === 403) {
                    Log::error('Chatbot Gemini API authentication failed', [
                        'status' => $response->status(),
                        'body' => substr($response->body(), 0, 200),
                    ]);
                    return null;
                }

                // Other errors
                Log::warning('Chatbot Gemini AI call failed', [
                    'status' => $response->status(),
                    'body' => substr($response->body(), 0, 200),
                    'attempt' => $attempt + 1,
                ]);
                
                if ($attempt < self::MAX_RETRIES) {
                    usleep(self::RETRY_DELAY_MS * 1000);
                    continue;
                }

                return null;

            } catch (Throwable $e) {
                $lastException = $e;
                Log::error('Chatbot Gemini AI exception', [
                    'message' => $e->getMessage(),
                    'attempt' => $attempt + 1,
                    'class' => get_class($e),
                ]);
                if ($attempt < self::MAX_RETRIES) {
                    usleep(self::RETRY_DELAY_MS * 1000);
                    continue; // Retry on exception
                }
            }
        }

        // All retries exhausted
        if ($lastException) {
            Log::error('All Gemini retries exhausted', [
                'message' => $lastException->getMessage(),
                'class' => get_class($lastException),
            ]);
        }

        return null;
    }

    private function extractRetryDelaySeconds(array $payload): int
    {
        $details = $payload['error']['details'] ?? null;
        if (!is_array($details)) {
            return 0;
        }

        foreach ($details as $detail) {
            if (!is_array($detail)) {
                continue;
            }

            $delay = $detail['retryDelay'] ?? null;
            if (!is_string($delay)) {
                continue;
            }

            if (preg_match('/^(\d+)s$/', trim($delay), $matches) === 1) {
                return (int) $matches[1];
            }
        }

        return 0;
    }

}
