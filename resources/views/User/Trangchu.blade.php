<!DOCTYPE html>
<html lang="en">

<head>
  @include('User.parts.head')
</head>

<body>
    <!--header-->
    @include('User.parts.header')
    <!--slider-->
    <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider1.jpg')}}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider2.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider3.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider4.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider5.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider6.jpg')}}" alt="">

            </div>
        </div>
        <div class="slider-arrow">
            <i class="ri-arrow-right-wide-line"></i>
            <i class="ri-arrow-left-wide-line"></i>
        </div>
        <!---Tao cac cham duoi slider-->
        <div class="slider-dots"></div>
    </section>
    <main>
        <!--containre-->
        <section class="content">

            <div class="content-one">
                <a href="http://127.0.0.1:8000/xemoi" ><p><i class="ri-roadster-fill"></i> Xe mới</p></a>
            </div>
            <div class="content-one">
                <a href="http://127.0.0.1:8000/dongxe" ><p><i class="ri-file-list-2-line"></i> Bảng giá</p></a>
            </div>
            <div class="content-one">
                  <a href="http://127.0.0.1:8000/trungtam" ><p><i class="ri-store-line"></i> Trung tâm</p></a>
            </div>
            <div class="content-one">
                 <a href="http://127.0.0.1:8000/dichvu" ><p><i class="ri-service-line"></i> Dịch vụ</p></a>
               
            </div>

        </section>
        <section class="Text">
            <p>Các dòng xe</p>
        </section>
        <!--xe-->
        <section class="car-line">
            <div class="car-line-one">
                <a href="http://127.0.0.1:8000/dongxe718" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider1.png')}}" alt="718">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>718</h1>
                        <p>Giá từ 3.850.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/dongxe911" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider2.png')}}" alt="911">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>911</h1>
                        <p>Giá từ 8.870.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/dongxetaycan" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider3.png')}}" alt="Taycan">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Taycan</h1>
                        <p>Giá từ 4.620.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/dongxepana" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider4.png')}}" alt="Panamera">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Panamera</h1>
                        <p>Giá từ 6.420.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/dongxemacan" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider5.png')}}" alt="Macan">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Macan</h1>
                        <p>Giá từ 3.350.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>
            </div>
            <div class="car-line-two">
                <a href="http://127.0.0.1:8000/dongxecayne" class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider6.png')}}" alt="Cayenne">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Cayenne</h1>
                        <p>Giá từ 5.560.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>
                    </div>
                </a>

            </div>

        </section>

        <!-- xe noi bat -->
        <section class="featured-cars" aria-label="Xe nổi bật">
            <div class="Text">
                <p>Xe nổi bật</p>
            </div>

            <div class="featured-cars-list">
                <div class="featured-cars-marquee marquee-row-one">
                    <div class="featured-cars-track">
                        <a href="{{ url('/911-carrera') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_911_1_2.png')}}" alt="911 Carrera">
                        </a>
                        <a href="{{ url('/911-carrera-s') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_911_3_2.png')}}" alt="911 Carrera S">
                        </a>
                        <a href="{{ url('/718-boxster') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_718_1_2.png')}}" alt="718 Boxster">
                        </a>
                        <a href="{{ url('/718-cayman-s') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_718_4_2.png')}}" alt="718 Cayman S">
                        </a>
                        <a href="{{ url('/taycan') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_taycan_1_2.png')}}" alt="Taycan">
                        </a>
                        <a href="{{ url('/taycan-turbo') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_taycan_6_2.png')}}" alt="Taycan Turbo">
                        </a>
                        <a href="{{ url('/macan-gts') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_mc_4_2.png')}}" alt="Macan GTS">
                        </a>
                        <a href="{{ url('/cayenne-gts') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_ce_4_2.png')}}" alt="Cayenne GTS">
                        </a>

                        <a href="{{ url('/911-carrera') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_911_1_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/911-carrera-s') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_911_3_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/718-boxster') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_718_1_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/718-cayman-s') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_718_4_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/taycan') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_taycan_1_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/taycan-turbo') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_taycan_6_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/macan-gts') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_mc_4_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/cayenne-gts') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_ce_4_2.png')}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="featured-cars-marquee marquee-row-two">
                    <div class="featured-cars-track">
                        <a href="{{ url('/cayenne-gts') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_ce_4_2.png')}}" alt="Cayenne GTS">
                        </a>
                        <a href="{{ url('/macan-gts') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_mc_4_2.png')}}" alt="Macan GTS">
                        </a>
                        <a href="{{ url('/taycan-turbo') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_taycan_6_2.png')}}" alt="Taycan Turbo">
                        </a>
                        <a href="{{ url('/taycan') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_taycan_1_2.png')}}" alt="Taycan">
                        </a>
                        <a href="{{ url('/718-cayman-s') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_718_4_2.png')}}" alt="718 Cayman S">
                        </a>
                        <a href="{{ url('/718-boxster') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_718_1_2.png')}}" alt="718 Boxster">
                        </a>
                        <a href="{{ url('/911-carrera-s') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_911_3_2.png')}}" alt="911 Carrera S">
                        </a>
                        <a href="{{ url('/911-carrera') }}" class="featured-car-item">
                            <img src="{{asset('frontend/asset/images/kp_911_1_2.png')}}" alt="911 Carrera">
                        </a>

                        <a href="{{ url('/cayenne-gts') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_ce_4_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/macan-gts') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_mc_4_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/taycan-turbo') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_taycan_6_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/taycan') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_taycan_1_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/718-cayman-s') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_718_4_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/718-boxster') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_718_1_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/911-carrera-s') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_911_3_2.png')}}" alt="">
                        </a>
                        <a href="{{ url('/911-carrera') }}" class="featured-car-item" aria-hidden="true" tabindex="-1">
                            <img src="{{asset('frontend/asset/images/kp_911_1_2.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="Text">
            <p>Khám phá</p>
        </section>
        <!---discovery-->
        <section class="discovery">
            <div class="discovery-showcase">
                <article class="discovery-layout-item">
                    <div class="discovery-layout-info">
                        <div class="discovery-layout-icon">
                            <i class="ri-steering-2-line"></i>
                        </div>
                        <h3>Ghế trẻ em Tequipment</h3>
                        <p>An toàn theo thiết kế của Porsche, mang đến sự yên tâm và đồng bộ cho mọi hành trình cùng gia đình.</p>
                    </div>
                    <div class="discovery-layout-image">
                        <img src="{{asset('frontend/asset/images/Carkp9.jpg')}}" alt="Ghế trẻ em Tequipment">
                    </div>
                </article>

                <article class="discovery-layout-item">
                    <div class="discovery-layout-info">
                        <div class="discovery-layout-icon">
                            <i class="ri-vip-diamond-line"></i>
                        </div>
                        <h3>Bộ sưu tập xe giới hạn</h3>
                        <p>Tuyển chọn các mẫu xe hiếm trên toàn thế giới với cấu hình độc bản, hiệu năng cao và giá trị sưu tầm đặc biệt.</p>
                    </div>
                    <div class="discovery-layout-image">
                        <img src="{{asset('frontend/asset/images/carkp5.png')}}" alt="Bộ sưu tập xe giới hạn">
                    </div>
                </article>

                <article class="discovery-layout-item">
                    <div class="discovery-layout-info">
                        <div class="discovery-layout-icon">
                            <i class="ri-service-line"></i>
                        </div>
                        <h3>Ưu đãi chăm sóc xe mùa nóng</h3>
                        <p>Gói kiểm tra và chăm sóc chuyên sâu giúp xe luôn vận hành tối ưu trong điều kiện thời tiết khắc nghiệt.</p>
                    </div>
                    <div class="discovery-layout-image">
                        <img src="{{asset('frontend/asset/images/Carkp7.jpg')}}" alt="Ưu đãi chăm sóc xe mùa nóng">
                    </div>
                </article>

                <article class="discovery-layout-item">
                    <div class="discovery-layout-info">
                        <div class="discovery-layout-icon">
                            <i class="ri-truck-line"></i>
                        </div>
                        <h3>Bảo dưỡng lưu động 2026</h3>
                        <p>Dịch vụ kỹ thuật linh hoạt tại điểm hẹn, hỗ trợ nhanh chóng để trải nghiệm vận hành luôn liền mạch.</p>
                    </div>
                    <div class="discovery-layout-image">
                        <img src="{{asset('frontend/asset/images/Carkp8.jpg')}}" alt="Dịch vụ bảo dưỡng lưu động 2026">
                    </div>
                </article>
            </div>
        </section>

<!--Contact-->
@include('User.parts.conatct')
    </main>
<!--FOOTER-->
    @include('User.parts.footer')
</body>
<script src="{{asset('frontend/asset/js/script.js')}}"></script>

</html>