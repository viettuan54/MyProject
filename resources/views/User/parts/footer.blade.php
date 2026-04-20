
<!-- FOOTER -->
<footer class="car-footer">
    <div class="footer-container">

        <div class="footer-left">
            <i class="ri-store-line"></i>
            <span>Store Việt Nam © 2025</span>
        </div>

        <div class="footer-right">
            <a href="#">Chính sách quyền riêng tư</a>
            <a href="#">Điều khoản sử dụng</a>
            <a href="#">Liên hệ</a>
        </div>

    </div>
</footer>

@if(session('error'))
    <div id="site-toast" class="site-toast site-toast-error">{{ session('error') }}</div>
@endif

{{-- Chatbox --}}
@include('User.parts.chatbox')

<!-- Luxury Header JavaScript -->
<script src="{{asset('frontend/asset/js/luxury-header.js')}}"></script>

<style>
    .site-toast {
        position: fixed;
        top: 24px;
        right: 24px;
        z-index: 99999;
        min-width: 320px;
        max-width: 420px;
        padding: 14px 16px;
        border-radius: 12px;
        box-shadow: 0 18px 38px rgba(0, 0, 0, 0.16);
        color: #ffffff;
        font-size: 14px;
        line-height: 1.5;
        animation: siteToastIn 0.25s ease-out;
    }

    .site-toast-error {
        background: linear-gradient(135deg, #c1121f 0%, #8f0f18 100%);
    }

    @keyframes siteToastIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 640px) {
        .site-toast {
            left: 12px;
            right: 12px;
            top: 12px;
            min-width: auto;
            max-width: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.getElementById('site-toast');

        if (toast) {
            setTimeout(function () {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
                toast.style.transform = 'translateY(-10px)';

                setTimeout(function () {
                    toast.remove();
                }, 450);
            }, 3000);
        }
    });
</script>