<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
 @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/ch-vl.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Cơ hội việc làm</p>
        </div>

        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span  style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span  style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>

            </div>
        </div>

    </section>
    <!---Co hoi viec lam-->
    <main>
        <section class="ch-vl">
            <div class="ch-vl-text1">
                <ul>
                    <li>Chúng tôi đang tìm kiếm những tài năng, những người trân trọng môi trường làm việc chuyên nghiệp
                        và cơ hội hàng đầu để phát triển bản thân. Nếu bạn tin rằng mình phù hợp với những yêu cầu công
                        việc từ Porsche và đam mê xe thể thao. Hãy trở thành một phần của huyền thoại Porsche.</li>
                    <li>Rất nhiều cơ hội dành cho bạn khi đến với Porsche - dù là sinh viên, cử nhân hay chuyên gia giàu
                        kinh nghiệm. Chúng tôi dành nhiều cơ hội phát triển sự nghiệp hấp dẫn cho những ai gắn kết với
                        Porsche.</li>
                </ul>
            </div>
            <p>Khu vực Hà Nội</p>
            <div class="ch-vl-text2">
                <div class="ch-vl-text2-1">
                    <ul>
                        <li><i class="ri-arrow-right-wide-line"></i><b>Kỹ thuật viên</b></li>
                        <li>Bộ phận: Hậu mãi</li>
                        <li>Ngày đăng tuyển:20.05.2025 </li>
                    </ul>
                </div>
                <div class="ch-vl-text2-2">
                    <ul>
                        <li><i class="ri-arrow-right-wide-line"></i><b>Chuyên viên dịch vụ</b></li>
                        <li>Bộ phận: Hậu mãi</li>
                        <li>Ngày đăng tuyển: 20.05.2025</li>
                    </ul>
                </div>
            </div>
            <p>Khu vực Thành phố Hồ Chí Minh</p>
            <div class="ch-vl-text3">
                <div class="ch-vl-text3-1">
                    <ul>
                        <li><i class="ri-arrow-right-wide-line"></i><b>Kỹ thuật viên</b></li>
                        <li>Bộ phận: Hậu mãi</li>
                        <li>Ngày đăng tuyển:20.05.2025 </li>
                    </ul>
                </div>

            </div>
        </section>








        <section class="Dv-text">
            <p>Tìm hiểu thêm</p>
        </section>
        <section class="Dv-end">
            <ul>
                <li>Cơ hội việc làm</li>
                <li>|</li>
                <li>Store AG</li>
                <li>|</li>
                <li> Store Việt Nam</li>
                <li>|</li>
                <li> Thông tin báo chí </li>
                <li>|</li>
                <li> Tin tức và Sự kiện</li>

            </ul>

        </section>
        <hr style="margin-top: 120px;">
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
</html>