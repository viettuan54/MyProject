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
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider1.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>718</h1>
                        <p>Giá từ 3.850.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>

                </div>
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider2.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>911</h1>
                        <p>Giá từ 8.870.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>

                </div>
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider3.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Taycan</h1>
                        <p>Giá từ 4.620.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>

                </div>
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider4.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Panamera</h1>
                        <p>Giá từ 6.420.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>

                </div>
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider5.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Macan</h1>
                        <p>Giá từ 3.350.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>
                </div>
            </div>
            <div class="car-line-two">
                <div class="car-line-one-item">
                    <img src="{{asset('frontend/asset/images/slider6.png')}}" alt="">
                    <div class="car-line-one-item-info">
                        <h1><i class="ri-arrow-right-wide-line"></i>Cayenne</h1>
                        <p>Giá từ 5.560.000.000 VND</p>
                        <p><i class="ri-arrow-right-wide-line"></i>Tất cả mẫu xe</p>
                        <p><i class="ri-arrow-right-wide-line"></i>So Sánh</p>

                    </div>
                </div>

            </div>

        </section>
        <section class="Text">
            <p>Khám phá</p>
        </section>
        <!---discovery-->
        <section class="discovery">
            <div class="discovery-items">
                <div class="discovery-item">
                    <img src="{{asset('frontend/asset/images/Carkp9.jpg')}}" alt="">
                    <div class="discovery-item-text">
                        <p><i class="ri-arrow-right-wide-line"></i>Ghế trẻ em Tequipment: An toàn theo thiết kế của Porsche</p>

                    </div>
                </div>
                <div class="discovery-item">
                    <img src="{{asset('frontend/asset/images/carkp5.png')}}" alt="">
                    <div class="discovery-item-text">
                        <p><i class="ri-arrow-right-wide-line"></i>Bộ sưu tập xe giới hạn trên toàn thế giới</p>

                    </div>
                </div>
                <div class="discovery-item">
                    <img src="{{asset('frontend/asset/images/Carkp7.jpg')}}" alt="">
                    <div class="discovery-item-text">
                        <p><i class="ri-arrow-right-wide-line"></i>Ưu đãi Dịch vụ Chăm sóc xe Mùa nóng 23.03 – 06.05.2026</p>

                    </div>
                </div>
                <div class="discovery-item">
                    <img src="{{asset('frontend/asset/images/Carkp8.jpg')}}" alt="">
                    <div class="discovery-item-text">
                        <p><i class="ri-arrow-right-wide-line"></i>Dịch vụ Bảo dưỡng Lưu động 2026 của Porsche
                        </p>

                    </div>
                </div>

            </div>
        </section>
        <hr style="margin-top: 80px;">

<!--Contact-->
        <section class="car-contact">
            <div class="car-contact-conten">
                <div class="car-contact-conten-left">
                    <p>Thông tin liên lạc:</p>
                    <p>STORECAR Việt Nam</p>
                    <p>Liên hệ chúng tôi: Viettuannger@gmail.com</p>
                    <p>Dịch vụ khách hàng: Storecar54@gmail.com</p>
                    <p>Các trung tâm của store</p>
                    <p>Trung tâm store TP.Hà Nội</p>
                    <p>Trung tâm store TP.Hồ Chí Minh</p>
                    <p>Trung tâm store TP.Sài Gòn</p>
                </div>
                <div class="car-contact-conten-right">
                    <div class="car-contact-conten-right-one">
                        <button><i class="ri-share-fill"></i> Chia sẻ trang</button>

                    </div>
                    <div class="car-contact-conten-right-two">
                        <p>Kết nối với Store</p>

                    </div>
                    <div class="car-contact-conten-right-three">
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-facebook-fill"></i>

                        </div>
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-youtube-line"></i>

                        </div>
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-instagram-line"></i>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
<!--FOOTER-->
    @include('User.parts.footer')
</body>
<script src="{{asset('frontend/asset/js/script.js')}}"></script>

</html>