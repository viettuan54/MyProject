<!DOCTYPE html>
<html lang="vi">
<head>
    @include('User.parts.head')
</head>
<body class="login">

<main>
    <section class="auth-wrapper">

        {{-- LOGO --}}
        <div class="auth-logo">
            <img src="{{ asset('frontend/asset/images/logo.png') }}" alt="Logo">
        </div>

        <h2>Xác thực khuôn mặt</h2>

        <p style="text-align:center; color:#666; margin-bottom:15px;">
            Vui lòng nhìn thẳng vào camera để xác thực
        </p>

        {{-- LỖI --}}
        <div id="face-error" class="auth-error" style="display:none;">
            Xác thực thất bại, vui lòng thử lại
        </div>

        {{-- CAMERA --}}
        <div class="auth-group" style="text-align:center;">
            <video id="video" width="260" height="200" autoplay
                   style="border-radius:12px; border:2px solid #ddd;"></video>
            <canvas id="canvas" width="260" height="200" style="display:none;"></canvas>
        </div>

        {{-- Status --}}
        <div id="status-box" style="text-align:center; margin-bottom:15px;">
            <span id="status-text" style="color:#666;">Đang khởi động camera...</span>
        </div>

        {{-- Attempt counter --}}
        <div id="attempt-box" style="text-align:center; margin-bottom:10px; font-size:12px; color:#999;">
            Lần thử: <span id="attempt-count">0</span>/3
        </div>

        <div class="auth-link">
            <a href="{{ url('/dangnhap') }}">← Quay lại đăng nhập</a>
        </div>

    </section>
</main>

<script>
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const errorBox = document.getElementById('face-error');
const statusText = document.getElementById('status-text');
const attemptCount = document.getElementById('attempt-count');

let isVerifying = false;
let verifyInterval = null;
let attempts = 0;
const VERIFY_INTERVAL_MS = 2000; // Xác thực mỗi 2 giây
const MAX_ATTEMPTS = 3; // Số lần thử tối đa

/* 🎥 Mở webcam */
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        video.srcObject = stream;
        statusText.innerText = 'Camera đã sẵn sàng. Đang xác thực...';
        statusText.style.color = '#22c55e';

        // Bắt đầu xác thực liên tục sau 1 giây
        setTimeout(() => {
            startContinuousVerify();
        }, 1000);
    })
    .catch(() => {
        errorBox.style.display = 'block';
        errorBox.innerText = 'Không thể mở camera';
        statusText.innerText = 'Lỗi camera';
        statusText.style.color = '#ef4444';
    });

/* 🔄 Xác thực liên tục */
function startContinuousVerify() {
    verifyInterval = setInterval(async () => {
        if (isVerifying) return; // Đang xử lý, bỏ qua

        await verifyFace();
    }, VERIFY_INTERVAL_MS);

    // Chạy lần đầu ngay lập tức
    verifyFace();
}

/* 📸 Chụp ảnh + gửi server */
async function verifyFace() {
    if (isVerifying) return;
    isVerifying = true;

    attempts++;
    attemptCount.innerText = attempts;
    statusText.innerText = `Đang xác thực... (lần ${attempts}/${MAX_ATTEMPTS})`;
    statusText.style.color = '#f59e0b';

    try {
        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        const image = canvas.toDataURL('image/jpeg');

        const res = await fetch("{{ route('admin.face.verify.post') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ image })
        });

        const data = await res.json();

        if (data.status === 'ok') {
            // Dừng xác thực
            clearInterval(verifyInterval);

            statusText.innerText = '✅ Xác thực thành công!';
            statusText.style.color = '#22c55e';

            const toast = document.getElementById('toast-success');
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s ease';
            }, 2500);

            setTimeout(() => {
                window.location.href = data.redirect;
            }, 3000);
        } else {
            // Thất bại, kiểm tra số lần thử
            if (attempts >= MAX_ATTEMPTS) {
                // Đã hết lần thử
                clearInterval(verifyInterval);
                statusText.innerText = '❌ Xác thực không thành công sau 3 lần thử';
                statusText.style.color = '#ef4444';
                errorBox.style.display = 'block';
                errorBox.innerText = 'Xác thực thất bại. Vui lòng quay lại đăng nhập và thử lại.';
            } else {
                // Còn lần thử, tiếp tục
                statusText.innerText = `Chưa nhận diện được. Đang thử lại... (còn ${MAX_ATTEMPTS - attempts} lần)`;
                statusText.style.color = '#ef4444';
            }
            isVerifying = false;
        }
    } catch (err) {
        console.error('Verify error:', err);
        if (attempts >= MAX_ATTEMPTS) {
            clearInterval(verifyInterval);
            statusText.innerText = '❌ Xác thực không thành công sau 3 lần thử';
            statusText.style.color = '#ef4444';
            errorBox.style.display = 'block';
            errorBox.innerText = 'Lỗi kết nối. Vui lòng quay lại đăng nhập và thử lại.';
        } else {
            statusText.innerText = `Lỗi kết nối. Đang thử lại... (còn ${MAX_ATTEMPTS - attempts} lần)`;
            statusText.style.color = '#ef4444';
        }
        isVerifying = false;
    }
}
</script>

</body>
<div id="toast-success" style="display:none;">
    ✅ Xác thực thành công
</div>
<style>
#toast-success {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #22c55e;
    color: #fff;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 14px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    z-index: 9999;
}
</style>

</html>
