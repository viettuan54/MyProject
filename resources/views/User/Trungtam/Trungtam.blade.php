<!DOCTYPE html>
<html lang="en">

<head>
  @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Các trung tâm Store</p>
        </div>

        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span  style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span  style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>

            </div>
        </div>

    </section>
    <!--Trung tam-->
    <main>
        <section class="car-tt">
            <div class="car-tt-items">
                <div class="car-tt-item">
                    <img src="{{asset('frontend/asset/images/car-tt1.png')}}" alt="">
                    <ul>
                        <li>Trung tâm Store Sài Gòn</li>
                        <li>Lô DVTM-5-6-7, đường số N1 và Lô DVTM-4, Đường số 7 <br>Khu Thương mại Nam, Khu Chế Xuất Tân
                            Thuận<br>Phường Tân Thuận Đông, Quận 7, Tp. Hồ Chí Minh</li>
                        <li>Email: <span>info@vvt-vietnam.com</span></li>
                        <li>Liên hệ</li>
                        <li>Phòng trưng bày: <span>+84 28 38727 911</span></li>
                        <li>Bộ phận Kinh doanh: <span>+84 909 768 911</span></li>
                        <li>Bộ phận Hậu mãi: <span>+84 28 38727 911 (ext. 1)</span></li>
                        <li>Dịch vụ hỗ trợ trên đường Porsche Assistance: <span>1800 6898</span> (khi xe không vận hành
                            được)</li>
                        <li>Giờ làm việc</li>
                        <li>Phòng trưng bày</li>
                        <li>Thứ Hai - Thứ Sáu: từ 8:30 đến 19:00</li>
                        <li>Thứ Bảy, Chủ Nhật: từ 9:00 đến 17:00</li>
                        <li>Dịch vụ bảo dưỡng xe</li>
                        <li>Thứ Hai - Thứ Sáu: từ 8:00 đến 18:00</li>
                        <li>Thứ Bảy: từ 8:00 đến 17:00, Chủ Nhật: làm việc theo yêu cầu</li>
                    </ul>
                    <button><i class="ri-menu-2-line"></i>Xem chi tiết</button>

                </div>
                <div class="car-tt-item">
                    <img src="{{asset('frontend/asset/images/car-tt2.png')}}" alt="">
                    <ul>
                        <li>Trung tâm Store Hà Nội</li>
                        <li>562 Nguyễn Văn Cừ <br>Phường Gia Thụy, Quận Long Biên<br>Hà Nội</li>
                        <li>Email: <span>info@vvt-vietnam.com</span></li>
                        <li>Liên hệ</li>
                        <li>Phòng trưng bày: <span>+84 24 62888 911</span></li>
                        <li>Bộ phận Kinh doanh: <span> +84 903 168 911</span></li>
                        <li>Bộ phận Hậu mãi: <span>+84 24 62888 911 (ext.1)</span></li>
                        <li>Dịch vụ hỗ trợ trên đường Porsche Assistance: <span>1800 6898</span> (khi xe không vận hành
                            được)</li>
                        <li>Giờ làm việc</li>
                        <li>Phòng trưng bày</li>
                        <li>Thứ Hai - Thứ Sáu: từ 8:30 đến 19:00</li>
                        <li>Thứ Bảy, Chủ Nhật: từ 9:00 đến 17:00</li>
                        <li>Dịch vụ bảo dưỡng xe</li>
                        <li>Thứ Hai - Thứ Sáu: từ 8:00 đến 18:00</li>
                        <li>Thứ Bảy: từ 8:00 đến 17:00, Chủ Nhật: làm việc theo yêu cầu</li>
                    </ul>
                    <button><i class="ri-menu-2-line"></i>Xem chi tiết</button>

                </div>

            </div>

        </section>
        <section class="car-tt-1">
            <div class="car-tt-items">
                <div class="car-tt-item">
                    <img src="{{asset('frontend/asset/images/car-tt3.jpg')}}" alt="">
                    <ul>
                        <li>Store Studio Hà Nội</li>
                        <li>Porsche Studio Hà Nội <br>Tầng 1, Tháp 1, Capital Place, 29 Liễu Giai, Ba Đình, Hà Nội</li>
                        <li>Email: <span>info@vvt-vietnam.com</span></li>
                        <li>Giờ làm việc</li>
                        <li>9:00 - 18:00, thứ Hai đến Chủ Nhật</li>
                        <li>Điện thoại:<span>+84 24 32239 911</span></li>

                    </ul>
                    <button><i class="ri-menu-2-line"></i>Xem chi tiết</button>
                </div>
            </div>

        </section>
        <hr style="margin-top: 120px;">
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
                    <div class="car-contact-conten-right-newcar">
                        <ul>
                            <li>Thông tin về Store</li>
                            <li>Store Việt Nam </li>
                            <li>Tin tức và sự kiện </li>
                            <li>Thông tin báo chí</li>
                            <li>Cơ hội việc làm</li>
                        </ul>

                    </div>


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
</html>