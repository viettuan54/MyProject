<!DOCTYPE html>
<html lang="en">

<head>
  @include('User.parts.head')
</head>

<body>
      @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dv-ctkm1.jpeg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Tin tức và Sự kiện</p>
        </div>

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
    <main>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/dv-ctkm2.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Ưu đãi Đặc biệt Bộ bánh xe Porsche
                            </a></li>
                        <li style="margin-top: 30px;"><a href="">

                                Tequipment 19/03/2025 Khám phá bản phối hoàn hảo giữa thẩm mỹ và hiệu năng của bộ bánh
                                xe Porsche Tequipment. Với thiết kế mâm độc quyền, đi cùng lốp chất lượng cao, bộ bánh
                                xe Porsche Tequipment sẽ đem lại những chuyến đi an toàn, thú vị và đậm cá tính. Đừng bỏ
                                lỡ cơ hội nâng [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>








        <section class="Dv-text">
            <p>Tìm hiểu thêm</p>
        </section>
        <section class="Dv-end">
            <ul>
                <li>Chương Trình Ưu Đãi Hậu Mãi</li>
                <li>|</li>
                <li>Dịch vụ bán hàng</li>
                <li>|</li>
                <li> Dịch vụ hậu mãi</li>
            </ul>

        </section>
        <!--Contact-->
        @include('User.parts.conatct')

    </main>
<!--FOOTER-->
@include('User.parts.footer')
</body>
</html>