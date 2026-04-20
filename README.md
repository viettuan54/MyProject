# ProjectCar - Porsche E-Commerce Platform

**ProjectCar** là một nền tảng bán xe Porsche trực tuyến hiện đại được xây dựng bằng Laravel 10 và Vite.

## 🚀 Tính Năng Chính

### 👥 Người Dùng
- **Duyệt Sản Phẩm**: Khám phá các mẫu xe Porsche (718, 911, Taycan, Panamera, Macan, Cayenne)
- **Giỏ Hàng**: Thêm/xóa sản phẩm, quản lý số lượng
- **Thanh Toán**: Quy trình checkout đơn giản
- **Quản Lý Đơn Hàng**: Xem lịch sử và chi tiết đơn hàng
- **Đánh Giá Sản Phẩm**: Viết và xem reviews
- **Chatbot AI**: Hỗ trợ khách hàng 24/7 với Google Gemini
- **Dịch Vụ**: Bảo hiểm, bảo trì, chương trình khuyến mại, hỗ trợ tài chính
- **Cửa Hàng**: Tìm cửa hàng và trung tâm dịch vụ

### 👨‍💼 Admin
- **Dashboard**: Tổng quan thống kê hệ thống
- **Quản Lý Sản Phẩm**: Thêm/sửa/xóa xe và phụ kiện
- **Quản Lý Danh Mục**: Tổ chức sản phẩm
- **Quản Lý Đơn Hàng**: Duyệt, phê duyệt/từ chối đơn hàng
- **Quản Lý Người Dùng**: Kiểm soát tài khoản người dùng
- **Xác Thực Khuôn Mặt**: Bảo mật nâng cao với FaceNet

## 🛠️ Tech Stack

| Thành Phần | Công Nghệ |
|-----------|-----------|
| **Backend** | Laravel 10, PHP 8.1+ |
| **Frontend** | Vite 4, JavaScript, Blade Templates |
| **Database** | MySQL |
| **API** | Laravel Sanctum |
| **AI** | Google Gemini 2.0 Flash |
| **Biometric** | FaceNet (Face Recognition) |
| **Tools** | PHPUnit, Laravel Pint, Faker |

## 📦 Cài Đặt

### Yêu Cầu
- PHP 8.1+
- MySQL
- Composer
- Node.js & npm

### Bước Cài Đặt
```bash
# Clone repository
git clone <repository-url>
cd ProjectCar

# Cài đặt dependencies
composer install
npm install

# Cấu hình environment
cp .env.example .env

# Tạo APP_KEY
php artisan key:generate

# Chạy migrations
php artisan migrate

# Build frontend
npm run build

# Chạy server
php artisan serve
```

## 🔑 Cấu Hình API Keys

### Google Gemini API
Để sử dụng chatbot AI, cần cấu hình Google Gemini API:

1. Truy cập [Google AI Studio](https://aistudio.google.com)
2. Tạo API key mới
3. Copy key vào file `.env`:
```env
GEMINI_API_KEY=your_api_key_here
GEMINI_MODEL=gemini-2.0-flash
GEMINI_ENDPOINT=https://generativelanguage.googleapis.com/v1beta/models
GEMINI_TEMPERATURE=0.2
```

## 📚 Tài Liệu

- [CART_IMPLEMENTATION_GUIDE.md](./CART_IMPLEMENTATION_GUIDE.md) - Hướng dẫn hệ thống giỏ hàng

## 📄 License

MIT License
