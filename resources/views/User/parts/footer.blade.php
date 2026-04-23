
<!-- FOOTER -->
<footer class="car-footer">
    <div class="footer-shell">
        <div class="footer-panel">
            <div class="footer-brand">
                <div class="footer-brand-head">
                    <i class="ri-store-2-line"></i>
                    <h3>STORECAR Viet Nam</h3>
                </div>
                <p>
                    Trung tam tu van va dich vu Porsche chinh hang, dong hanh cung ban
                    tren moi hanh trinh voi trai nghiem cao cap.
                </p>

                <div class="footer-social" aria-label="Mang xa hoi StoreCar">
                    <a href="#" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                    <a href="#" aria-label="YouTube"><i class="ri-youtube-line"></i></a>
                    <a href="#" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                    <a href="#" aria-label="TikTok"><i class="ri-tiktok-line"></i></a>
                </div>
            </div>

            <div class="footer-links-block">
                <h4>Dieu huong nhanh</h4>
                <a href="{{ url('/xemoi') }}">Xe moi</a>
                <a href="{{ url('/dongxe') }}">Bang gia</a>
                <a href="{{ url('/trungtam') }}">Trung tam</a>
                <a href="{{ url('/dichvu') }}">Dich vu</a>
            </div>

            <div class="footer-contact-block">
                <h4>Thong tin lien he</h4>
                <a href="tel:0569973315"><i class="ri-phone-line"></i> 0569 973 315</a>
                <a href="mailto:storecar54@gmail.com"><i class="ri-mail-line"></i> storecar54@gmail.com</a>
                <p><i class="ri-map-pin-line"></i> Ha Noi - TP. Ho Chi Minh - Sai Gon</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2026 STORECAR Viet Nam. All rights reserved.</p>
            <div class="footer-legal">
                <a href="#">Chinh sach quyen rieng tu</a>
                <a href="#">Dieu khoan su dung</a>
                <a href="#">Lien he</a>
            </div>
        </div>
    </div>
</footer>

@if(session('error'))
    <div id="site-toast" class="site-toast site-toast-error">{{ session('error') }}</div>
@endif

{{-- Chatbox --}}
@include('User.parts.chatbox')

<!-- Luxury Header JavaScript -->
<script src="{{asset('frontend/asset/js/luxury-header.js')}}?v=20260422-1"></script>

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