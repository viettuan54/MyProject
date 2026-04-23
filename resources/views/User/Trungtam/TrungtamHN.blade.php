<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    
    <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/tt-hn1.jpg')}}" alt="">
            </div>
            @include('User.parts.slidertrungtam')
            

    <main>
        
        <section class="tt-sg-container">
            <p class="tt-sg-text">Tìm chiếc Porsche trong mơ của bạn</p>
            <div class="tt-sg-items">
                <div class="tt-sg-item">
                    <img src="{{asset('frontend/asset/images/newcar9.jpg')}}" alt="">
                    <div class="tt-sg-item-text">
                    <a href="http://127.0.0.1:8000/xemoi">
                        <ul>
                            <li>Xe Mới</li>
                            <li style="margin-left: 370px;"><i class="ri-arrow-right-line"></i></li>
                        </ul>
                    </a>
                    </div>


                </div>
                <div class="tt-sg-item" style="margin-left: 20px;">
                    <img src="{{asset('frontend/asset/images/newcar11.jpg')}}" alt="">
                    <div class="tt-sg-item-text">
                    <a href="http://127.0.0.1:8000/dongxe">
                        <ul>
                            <li>Các dòng xe</li>
                            <li style="margin-left: 320px;"><i class="ri-arrow-right-line"></i></li>
                        </ul>
                    </a>
                    </div>

                </div>
            </div>

        </section>
        <section class="tt-sg-car">
            <p class="tt-sg-text">Cá nhân hóa chiếc Porsche của bạn</p>
            <div class="car-dx-content-items">
                <div class="car-dx-content-item">
                    <img src="{{asset('frontend/asset/images/car-dx5.png')}}" alt="">
                    <Li>911 Carrera</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: 8.870.000.000 VNĐ*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i>Tạo cấu hình</button>
                    </li>


                </div>
                <div class="car-dx-content-item">
                    <img src="{{asset('frontend/asset/images/car-dx6.png')}}" alt="">
                    <Li>911 Carrera T</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: 9.770.000.000 VNĐ*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i>Tạo cấu hình</button>
                    </li>

                </div>
                <div class="car-dx-content-item">
                    <img src="{{asset('frontend/asset/images/car-dx7.png')}}" alt="">
                    <Li>911 Carrera S</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: 10.300.000.000 VNĐ*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i>Tạo cấu hình</button>
                    </li>

                </div>
                <div class="car-dx-content-item">
                    <img src="{{asset('frontend/asset/images/car-dx8.png')}}" alt="">
                    <Li>911 Carrera GTS</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: 13.200.000.000 VNĐ*</li>
                    <li style="margin-top: 20px; "><button><i class="ri-arrow-right-wide-line"></i>Tạo cấu hình</button>
                    </li>

                </div>
            </div>
        </section>
        <section class="tt-sg-kp">
            <p class="tt-sg-text">Khám phá</p>
            <div class="tt-sg-kp-items">
                <div class="tt-sg-kp-item">
                    <img src="{{asset('frontend/asset/images/tt-sg2.jpg')}}" alt="">
                    <li>Phụ kiện Tequipment</li>
                    <button style="margin-top: 50px;">Tìm hiểu thêm</button>
                </div>
                <div class="tt-sg-kp-item" style="margin-left: 20px;">
                    <img src="{{asset('frontend/asset/images/tt-sg3.jpg')}}" alt="">
                    <li>Bộ Sưu Tập Thời Trang <br>của Porsche</li>
                    <button>Tìm hiểu thêm</button>
                </div>
                <div class="tt-sg-kp-item" style="margin-left: 20px;">
                    <img src="{{asset('frontend/asset/images/tt-sg4.jpg')}}" alt="">
                    <li>Trung Tâm Porsche Sài<br> Gòn Mới</li>
                    <button>Tìm hiểu thêm</button>
                </div>
            </div>
        </section>
        <section class="tt-sg-ttsk">
            <p class="tt-sg-text">Tin tức & Sự kiện</p>
            <div class="tt-sg-ttsk-all">
                <div class="tt-sg-ttsk-img">
                    <img src="{{asset('frontend/asset/images/tt-sg5.jpg')}}" alt="">
                    <div class="tt-sg-ttsk-text">
                        <ul>
                            <li>Dịch vụ Bảo dưỡng Lưu động 2025<br> của Porsche</li>
                            <li> Trọn vẹn yên tâm khi xe Porsche của Quý khách<br> vẫn được tận hưởng dịch vụ chuyên
                                nghiệp,
                                dù<br>
                                ở bất cứ nơi đâu ngoài các Trung tâm Porsche<br> tại Việt Nam.</li>
                            <li><button><i class="ri-arrow-right-wide-line"></i>Tìm hiểu thêm</button></li>
                        </ul>

                    </div>
                </div>
                <div class="tt-sg-ttsk-img" style="margin-left: 30px;">
                    <img src="{{asset('frontend/asset/images/tt-hn3.jpg')}}" alt="">
                    <div class="tt-sg-ttsk-text">
                        <ul>
                            <li>
                                Porsche Studio chính thức có mặt<br> tại Hà Nội
                            </li>
                            <li> Porsche Studio - điểm hẹn phong cách sống<br> đẳng cấp tại trung tâm thành phố dành
                                cho<br>
                                những người cách tân - đã chính thức có mặt<br> tại Hà Nội.</li>
                            <li><button><i class="ri-arrow-right-wide-line"></i>Tìm hiểu thêm</button></li>
                        </ul>

                    </div>
                </div>

                <div class="tt-sg-ttsk-img" style="margin-left: 30px;">
                    <img src="{{asset('frontend/asset/images/tt-hn2.jpg')}}" alt="">
                    <div class="tt-sg-ttsk-text">
                        <ul>
                            <li>
                                Trạm sạc xe điện tại Porsche Studio<br> Hà Nội
                            </li>
                            <li>
                                Porsche Studio Hà Nội đã mở cửa trở lại chào<br> đón Quý khách và cung cấp những tiện
                                ích
                                mới:<br> trạm sạc Porsche Destination Charging dành<br> cho dòng xe thể thao điện Taycan
                                đã sẵn
                                sàng<br> đi vào hoạt động.</li>
                            <li><button><i class="ri-arrow-right-wide-line"></i>Tìm hiểu thêm</button></li>
                        </ul>

                    </div>
                </div>
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
