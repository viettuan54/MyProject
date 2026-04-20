# 🧪 Testing Chatbot After Fix

## Quick Test Script

Sao chép các lệnh sau và chạy trong **Laravel Tinker**:

```bash
php artisan tinker
```

### Test 1: Kiểm Tra Dữ Liệu Xe 718 Trong Database

```php
// Xem các xe 718 có trong database không
\App\Models\product::where('name', 'like', '%718%')->pluck('name', 'id');

// Kết quả mong đợi:
// [1 => "Porsche 718 Cayman", 2 => "Porsche 718 Boxster", ...]
```

### Test 2: Kiểm Tra ProductSearchService

```php
// Tạo instance của service
$service = new \App\Services\ProductSearchService();

// Tìm kiếm xe 718
$products = $service->searchByQuestion('Có bao nhiêu loại xe 718?', 10);

// Kiểm tra kết quả
$products->count();  // Số lượng xe 718 tìm được
$products->pluck('name');  // Tên tất cả xe 718

// Format context (nhìn thấy output cho Gemini)
$context = $service->formatAsContext($products);
echo $context;  // In ra format text
```

### Test 3: Kiểm Tra ChatbotController Trực Tiếp

```php
// Tạo request giả lập
$request = new \Illuminate\Http\Request();
$request->merge(['question' => 'Có bao nhiêu loại xe 718?']);

// Tạo controller
$controller = app(\App\Http\Controllers\ChatbotController::class);

// Gọi handle method
$response = $controller->handle($request);

// Xem kết quả
$response->getData();  // Trả về object JSON
```

### Test 4: Kiểm Tra API Endpoint

```bash
# Dùng curl hoặc Postman
curl -X POST http://localhost:8000/api/chatbot \
  -H "Content-Type: application/json" \
  -d '{"question": "Có bao nhiêu loại xe 718?"}'

# Hoặc trong tinker
$http = new \Illuminate\Http\Client\Factory();
$response = $http->post('http://localhost:8000/api/chatbot', [
    'question' => 'Có bao nhiêu loại xe 718?'
]);
echo $response->json('answer');
```

---

## Expected Results

| Test | Input | Expected Output |
|------|-------|-----------------|
| **Test 1** | Query products table | List of 718 models (Cayman, Boxster, Spyder, etc.) |
| **Test 2** | `searchByQuestion('718')` | Collection with 3-4 products named "Porsche 718 ..." |
| **Test 2** | `formatAsContext($products)` | Formatted text with specs: "- Porsche 718 Cayman\n  Giá: 3.85B..." |
| **Test 3** | Controller with "718?" | JSON response: `{"answer": "Có 3 loại xe 718: Cayman, Boxster, Spyder"}` |
| **Test 4** | API POST `/api/chatbot` | Same JSON response with 718 details |

---

## Debugging Tips

### Nếu không tìm thấy xe 718:

```php
// 1. Kiểm tra table tồn tại không
\Schema::hasTable('products');  // true/false

// 2. Kiểm tra có bản ghi không
\App\Models\product::count();  // > 0

// 3. Kiểm tra có xe 718 không
\App\Models\product::where('name', 'like', '%718%')->exists();  // true/false

// 4. Xem tất cả xe nào có
\App\Models\product::pluck('name')->unique();

// 5. Kiểm tra ProductSearchService config
$service = new \App\Services\ProductSearchService();
$products = $service->searchByQuestion('718', 20);
dd($products);  // Dump & die để xem chi tiết
```

### Nếu Gemini không trả lời:

```php
// Kiểm tra API key
config('services.gemini.api_key');  // Should not be null/empty

// Kiểm tra service được cấu hình chưa
app(\App\Services\AiChatService::class)->isConfigured();  // true/false

// Test Gemini API trực tiếp
$aiService = app(\App\Services\AiChatService::class);
$answer = $aiService->ask('Có bao nhiêu loại xe 718?', 'Các xe 718 có: Cayman, Boxster, Spyder');
dd($answer);
```

---

## Browser UI Test

### Cách test trên giao diện:

1. Mở ứng dụng: `http://localhost:8000`
2. Click icon chatbot (góc phải hoặc tìm chatbox)
3. Hỏi: "Có bao nhiêu loại xe 718?"
4. **Kỳ vọng:** Chatbot liệt kê chi tiết các mẫu 718 từ database

### Các câu hỏi test khác:

```
- "Xe 718 Cayman có công suất bao nhiêu?"
- "Giá chiếc 911 là bao nhiêu?"
- "Taycan nhanh hơn 718 không?"
- "Xe nào rẻ nhất của Porsche?"
- "Chi tiết kỹ thuật Panamera"
```

---

## Checklist Kiểm Tra

- [ ] Dữ liệu xe 718 có trong database `products` table
- [ ] `ProductSearchService` được tạo và có thể import
- [ ] `ChatbotController` được cập nhật để sử dụng new service
- [ ] API endpoint `/api/chatbot` return kết quả với dữ liệu sản phẩm
- [ ] Chatbox UI hiển thị câu trả lời đầy đủ về xe 718
- [ ] Gemini API được cấu hình đúng (check `.env` có GEMINI_API_KEY)

---

## Rollback (Nếu Cần)

Nếu có vấn đề, rollback code:

```bash
# Xem commits gần đây
git log --oneline -5

# Revert lại commit trước
git revert <commit_hash>

# Hoặc reset
git reset --hard HEAD~1
```

---

**Status:** Ready for testing! 🚀

Sau khi kiểm tra xong, commit thay đổi:
```bash
git add .
git commit -m "Improve: Integrate product database into chatbot for accurate vehicle queries"
```
