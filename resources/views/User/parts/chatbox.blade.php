{{-- Chatbox Partial --}}

<!-- Nút mở chatbox -->
<button id="chatbox-toggle" title="Hỗ trợ trực tuyến">
    <i class="ri-chat-3-line"></i>
</button>

<!-- Container chatbox -->
<div id="chatbox-container">
    <!-- Header -->
    <div id="chatbox-header">
        <div class="chatbox-header-info">
            <div class="chatbox-avatar">
                <i class="ri-customer-service-2-line"></i>
            </div>
            <div class="chatbox-title">
                <span>Porsche Assistant</span>
                <small class="chatbox-status">Trực tuyến</small>
            </div>
        </div>
        <button id="chatbox-close" title="Đóng">
            <i class="ri-close-line"></i>
        </button>
    </div>

    <!-- Khu vực tin nhắn -->
    <div id="chatbox-messages"></div>

    <!-- Quick suggestions -->
    <div id="chatbox-suggestions" class="chatbox-suggestions"></div>

    <!-- Khu vực nhập -->
    <div id="chatbox-input-area">
        <input type="text" id="chatbox-input" placeholder="Nhập câu hỏi của bạn..." autocomplete="off" />
        <button id="chatbox-send" title="Gửi">
            <i class="ri-send-plane-2-fill"></i>
        </button>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('frontend/asset/chatbox.css') }}">
<script src="{{ asset('frontend/asset/chatbox.js') }}"></script>
