<!DOCTYPE html>
<html lang="en">

<head>
  @include('User.parts.head')
</head>

<body>
     @include('User.parts.header')
    <!--new-car-conten-->
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Xe mới</p>
        </div>

        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span  style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span  style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>

            </div>
        </div>

    </section>

    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar1.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar2.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i> Cayenne 243737</li>
                    <li>Mã số <span style="margin-left: 280px;">549111</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Trắng</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen - Tím</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">6.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>
        <hr style="margin-top: 40px; width: 1200px;">

    </section>
    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar3.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar4.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i> Lamborghini Aventador SVJ </li>
                    <li>Mã số <span style="margin-left: 280px;">549222</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Nâu đen</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">9.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>
        <hr style="margin-top: 40px; width: 1200px;">

    </section>
    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar5.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar6.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i> McLaren 720S</li>
                    <li>Mã số <span style="margin-left: 280px;">549333</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Trắng</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen - cam</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">7.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>
        <hr style="margin-top: 40px; width: 1200px;">

    </section>
    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar7.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar8.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i>LaFerrari Aperta</li>
                    <li>Mã số <span style="margin-left: 280px;">549444</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Đỏ</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen - Đỏ</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">10.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>
        <hr style="margin-top: 40px; width: 1200px;">

    </section>
    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar9.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar10.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i> Koenigsegg Regera </li>
                    <li>Mã số <span style="margin-left: 280px;">549555</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Trắng</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen - Trắng</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">12.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>
        <hr style="margin-top: 40px; width: 1200px;">

    </section>
    <section class="newcar-contents">
        <div class="newcar-content">
            <div class="newcar-content-one">
                <div class="newcar-content-one-top">
                    <img src="{{asset('frontend/asset/images/newcar11.jpg')}}" alt="">

                </div>
                <div class="newcar-content-one-bottum">
                    <img src="{{asset('frontend/asset/images/newcar12.jpg')}}" alt="">

                </div>

            </div>
            <div class="newcar-content-two">
                <ul>
                    <li><i class="ri-arrow-right-wide-line"></i> Chevrolet Corvette Stingray C8</li>
                    <li>Mã số <span style="margin-left: 280px;">549666</span></li>
                    <hr>
                    <li>Ngoại thất <span style="margin-left: 255px;">Xanh</span></li>
                    <hr>
                    <li>Nội thất <span style="margin-left: 270px;">Đen - Xanh</span></li>
                    <hr>
                    <li>Động cơ <span style="margin-left: 265px;">Tăng áp, V6</span></li>
                    <hr>
                    <li>Dung tích (cc)<span style="margin-left: 240px;">2.995</span></li>
                    <hr>
                    <li>Công suất tối đa (hp/rpm) <span style="margin-left: 165px;">353</span></li>
                    <hr>
                    <li>Mô-men xoắn cực đại (Nm/rpm) <span style="margin-left: 125px;">500</span></li>
                    <hr>
                    <li>Thời gian tăng tốc (s/giây) (0~100km/giờ) <span style="margin-left: 65px;">5,7</span></li>
                    <hr>
                    <li>Tốc độ tối đa (km/giờ) <span style="margin-left: 185px;">248</span></li>
                    <hr>
                    <li>Tự trọng (DIN) (kg) <span style="margin-left: 205px;">2.055</span></li>
                    <hr>
                    <li>Giá bán<span style="margin-left: 280px; font-weight: bold;">8.649.400.000 VNĐ</span></li>
                </ul>

                <div class="newcar-content-two-show">
                    <button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>

                </div>
            </div>


        </div>


    </section>
    <main>
 @include('User.parts.conatct')
    </main>
<!--FOOTER-->
    @include('User.parts.footer')

</body>
</html>