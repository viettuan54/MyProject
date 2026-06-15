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

        <h2>Thông tin cá nhân</h2>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="profile-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/ttuser') }}" enctype="multipart/form-data">
            @csrf

            {{-- AVATAR --}}
            <div class="profile-avatar">
                <img
                    id="avatar-preview"
                    src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : '' }}"
                    alt="Avatar"
                    data-initial-src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : '' }}"
                    @if(!Auth::user()->avatar) style="display: none;" @endif
                >
                <i id="avatar-placeholder" class="fa-solid fa-user" @if(Auth::user()->avatar) style="display: none;" @endif></i>
            </div>

            <div class="auth-group">
                <input type="file" name="avatar" id="avatar-input" accept="image/*">
            </div>

            {{-- NAME --}}
            <div class="auth-group">
                <input
                    type="text"
                    name="name"
                    value="{{ Auth::user()->name }}"
                    placeholder="Họ tên"
                    required
                >
            </div>

            {{-- EMAIL --}}
            <div class="auth-group">
                <input
                    type="email"
                    value="{{ Auth::user()->email }}"
                    disabled
                >
            </div>

            {{-- PASSWORD --}}
            <div class="auth-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Mật khẩu mới (nếu đổi)"
                >
            </div>

            <div class="auth-group">
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Xác nhận mật khẩu"
                >
            </div>

            <button type="submit" class="auth-btn">
                Cập nhật hồ sơ
            </button>
            <a href="{{ url('/') }}" class="auth-btn auth-btn-back">
                Quay lại trang chủ
            </a>
        </form>

    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fileInput = document.getElementById('avatar-input');
        const avatarImg = document.getElementById('avatar-preview');
        const avatarIcon = document.getElementById('avatar-placeholder');

        if (!fileInput || !avatarImg || !avatarIcon) {
            return;
        }

        const initialSrc = avatarImg.dataset.initialSrc;

        fileInput.addEventListener('change', () => {
            const file = fileInput.files && fileInput.files[0];

            if (!file) {
                if (initialSrc) {
                    avatarImg.src = initialSrc;
                    avatarImg.style.display = 'block';
                    avatarIcon.style.display = 'none';
                } else {
                    avatarImg.style.display = 'none';
                    avatarIcon.style.display = 'flex';
                }
                return;
            }

            const reader = new FileReader();
            reader.onload = (event) => {
                avatarImg.src = event.target.result;
                avatarImg.style.display = 'block';
                avatarIcon.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    });
</script>

</body>
</html>
