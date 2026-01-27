<!DOCTYPE html>
<html lang="en">

<head>
   @include('User.parts.head')
</head>

<body>
  @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/tt-sk1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Tin tức và Sự kiện</p>
        </div>

        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span  style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span  style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>

            </div>
        </div>

    </section>
    <main>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk2.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Dịch vụ Bảo dưỡng Lưu động 2025 của
                                Porsche <br>20/02/2025</a></li>
                        <li style="margin-top: 30px;"><a href="">Trọn vẹn yên tâm khi xe Porsche của Quý khách vẫn được
                                tận hưởng dịch vụ chuyên
                                nghiệp,
                                dù ở bất cứ nơi đâu ngoài các Trung tâm Porsche tại Việt Nam. Với Dịch vụ Bảo dưỡng Lưu
                                động, đội ngũ kỹ thuật viên được chứng nhận của Porsche sẽ kiểm tra toàn diện cho
                                [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk3.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href="">Bản tin Dịch vụ Porsche 2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                01/10/2024 Tại Porsche, chúng tôi trân trọng từng khoảng khắc trên chiếc xe thể thao mơ
                                ước và luôn mong muốn đem tới cho bạn những kỷ niệm tuyệt vời cùng chiếc Porsche của
                                mình. Đặc biệt là khi mùa Giáng sinh và Năm mới đang đến gần. Trong Bản tin Dịch vụ
                                Porsche 2024, hãy [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk4.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Porsche 911 Dakar. Động Lực Vô Hạn. Cảm Hứng Bất Tận.
                                <br> 30/08/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Kết hợp hoàn hảo giữa cỗ máy kinh điển và khả năng việt dã có một không hai, Porsche 911
                                Dakar là mẫu xe mơ ước của những tay lái đam mê những hành trình ngoạn mục. Tròn một năm
                                chiếc 911 Dakar đầu tiên tại Việt Nam được giao tới chủ nhân, Porsche Việt [...]</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk5.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Chương trình kiểm tra hệ thống phanh cầu trước cho dòng xe
                                Taycan<br>13/08/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Mục tiêu phát triển của Porsche luôn đi cùng sự đảm bảo tiêu chuẩn nghiêm ngặt về chất
                                lượng của các dòng xe. Porsche AG luôn nỗ lực và không ngừng thực hiện việc đánh giá,
                                phân tích và cải tiến chất lượng sản phẩm. Vì vậy, Porsche Việt Nam thông báo chương
                                trình kiểm [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk6.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Ưu đãi Bộ sưu tập Phong cách sống Motorsport<br>24/06/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Sống cùng không khí cuồng nhiệt của giải đua Le Mans huyền thoại với Bộ sưu tập Phong
                                cách sống độc quyền từ Porsche. Cảm nhận tinh thần thể thao nguyên bản trong từng thiết
                                kế trang phục và phụ kiện. Từ 24.06 đến 07.08.2024, sở hữu một phần lịch sử thể thao tốc
                                độ [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-sk7.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href="">Lều dã ngoại - Phụ kiện Porsche Tequipment<br> 16/10/2023</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Lều dã ngoại là một trong những phụ kiện mới và chính hãng của Porsche (Porsche
                                Tequipment) có phần vỏ cao cấp được phát triển tại Trung tâm Phát triển Weissach và được
                                đồng thiết kế bởi Studio F.A. Porsche tại thị trấn Zell am See. Vỏ hộp có thể được lắp
                                đặt trên giá [...]</a></li>
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