<?php
/**
 * Chatbot API Test Script
 * Run: php test_chatbot_api.php
 */

// Load Laravel
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Services\AiChatService;
use App\Services\KnowledgeSearchService;
use App\Services\ProductSearchService;
use App\Services\ChatContextBuilderService;
use App\Models\KnowledgeItem;

echo "========================================\n";
echo "CHATBOT API TEST\n";
echo "========================================\n\n";

// Test 1: Check Configuration
echo "1️⃣  Checking Gemini Configuration...\n";
$aiService = app(AiChatService::class);
$isConfigured = $aiService->isConfigured();
echo "   Configured: " . ($isConfigured ? "✅ YES" : "❌ NO") . "\n";
echo "   API Key: " . (config('services.gemini.api_key') ? "✅ Set" : "❌ Not set") . "\n";
echo "   Model: " . config('services.gemini.model') . "\n";
echo "   Endpoint: " . config('services.gemini.endpoint') . "\n";
echo "   Temperature: " . config('services.gemini.temperature') . "\n\n";

// Test 2: Check Knowledge Items
echo "2️⃣  Checking Knowledge Items...\n";
$itemCount = KnowledgeItem::where('is_active', true)->count();
echo "   Total Knowledge Items: " . $itemCount . "\n";
if ($itemCount > 0) {
    $items = KnowledgeItem::where('is_active', true)->limit(3)->get();
    foreach ($items as $item) {
        echo "   - " . substr($item->title, 0, 50) . "...\n";
    }
}
echo "\n";

// Test 3: Test Knowledge Search
echo "3️⃣  Testing Knowledge Search...\n";
$searchService = app(KnowledgeSearchService::class);
$results = $searchService->search("Porsche 911", 5);
echo "   Search Results for '911': " . $results->count() . " items\n";
if ($results->count() > 0) {
    echo "   Top Result: " . $results->first()->title . "\n";
}
echo "\n";

// Test 4: Test Product Search
echo "4️⃣  Testing Product Search...\n";
$productService = app(ProductSearchService::class);
$products = $productService->searchByQuestion("Tôi muốn một chiếc Porsche 911", 5);
echo "   Search Results for '911 question': " . $products->count() . " products\n";
echo "\n";

// Test 5: Test Context Building
echo "5️⃣  Testing Context Building...\n";
$contextService = app(ChatContextBuilderService::class);
$items = KnowledgeItem::where('is_active', true)->limit(3)->get();
$context = $contextService->build($items, 1000);
echo "   Context Length: " . strlen($context) . " characters\n";
echo "   Context Preview: " . substr($context, 0, 100) . "...\n\n";

// Test 6: Test AI Service (if configured)
if ($isConfigured) {
    echo "6️⃣  Testing Google Gemini API...\n";
    $testQuestion = "Giá của Porsche 911 bao nhiêu?";
    $testContext = "Porsche 911 là dòng xe biểu tượng. Giá từ 8,870 tỷ VND.";
    
    echo "   Question: " . $testQuestion . "\n";
    echo "   Calling Gemini API...\n";
    
    $answer = $aiService->ask($testQuestion, $testContext);
    if ($answer) {
        echo "   ✅ API Response: " . substr($answer, 0, 100) . "...\n";
    } else {
        echo "   ❌ API Failed (returned null)\n";
        echo "   Check logs at: " . storage_path('logs/laravel.log') . "\n";
    }
} else {
    echo "6️⃣  Skipping AI Service Test (API not configured)\n";
}

echo "\n========================================\n";
echo "TEST COMPLETE\n";
echo "========================================\n";

// Show Laravel log file path
echo "\n📋 Log file location: " . storage_path('logs/laravel.log') . "\n";
echo "Run: tail -f " . storage_path('logs/laravel.log') . "\n";
