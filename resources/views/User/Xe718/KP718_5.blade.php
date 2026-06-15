<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
   @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/kp_718_5_1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead" style="height: 80px;">


 <div class="overhead-menu">
            <button type="button" class="newcar-menu-button" aria-label="Mở menu">
                <i class="ri-menu-line"></i>
            </button>
            <div class="newcar-dropdown-menu">
                <a class="newcar-menu-item" href="{{ url('/') }}">
                    <span>Trang chủ</span>
                    <i class="ri-arrow-up-wide-line"></i>
                </a>
                <a class="newcar-menu-item" href="{{ url('/dongxe') }}">
                    <span>Về đầu trang</span>
                    <i class="ri-arrow-up-wide-line"></i>
                </a>
            </div>
        </div>

    </section>

    @include('User.Xe718.main')

<!--FOOTER-->
    @include('User.parts.footer')
</body>
   <script src="{{asset('frontend/asset/js/dongxe.js')}}"></script>
</html>