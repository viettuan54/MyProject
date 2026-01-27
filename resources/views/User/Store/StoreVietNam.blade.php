<!DOCTYPE html>
<html lang="en">

<head>

  @include('User.parts.head')
</head>

<body>
  @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/Store-Viet-Nam.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Store Việt Nam</p>
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
        <section class="StoreAG-texts">
            <div class="StoreAG-text">
                <ul>
                    <li>Thành lập từ năm 2007, Porsche đã đánh dấu gần hai thập kỷ phát triển vững mạnh tại thị trường
                        Việt Nam, xác lập vị thế hàng đầu trong phân khúc ô tô thể thao hạng sang. Porsche Việt Nam hiện
                        phát triển mạnh mẽ với Trung tâm Porsche Sài Gòn, Trung tâm Porsche Hà Nội và điểm đến phong
                        cách sống Porsche Studio Hà Nội với cơ sở hạ tầng và trang thiết bị hiện đại cùng đội ngũ gần
                        200 nhân viên, cung cấp những dịch vụ theo tiêu chuẩn của Porsche toàn cầu.</li>
                    <li>Porsche mang đến thị trường Việt Nam các dòng xe đậm chất thể thao bao gồm: dòng xe 911 huyền
                        thoại, bộ đôi 718 Boxster và 718 Cayman, dòng xe Gran Turismo Panamera, dòng xe SUV Cayenne,
                        dòng xe compact SUV Macan và dòng xe điện Taycan. Bên cạnh đó, khả năng cá nhân hóa tối ưu và
                        tính thể thao ở mỗi dòng xe chính là những yếu tố tạo nên sự độc đáo của thương hiệu xe thể thao
                        Porsche.</li>
                    <li>Bên cạnh lĩnh vực kinh doanh xe, sự phát triển cộng hưởng và tích cực ở các lĩnh vực khác đã
                        đóng góp không nhỏ vào hoạt động kinh doanh của Porsche Việt Nam. Các dịch vụ như Hậu mãi, Trang
                        Thiết Bị Đặc Biệt Porsche Tequipment, Bộ Sưu Tập Phong Cách Sống Porsche Lifestyle và nhiều dịch
                        vụ cao cấp khác, đều mang bản sắc và giá trị đẳng cấp của Porsche.</li>
                    <li>Porsche Việt Nam sẽ tiếp tục giới thiệu những dòng xe cao cấp, hệ thống dịch vụ chuyên nghiệp
                        cùng những trải nghiệm đầy cảm xúc đến những người yêu mến Porsche.</li>
                    <li style="font-weight: bold;">Về công ty TNHH Xe Hơi Tối Thượng</li>
                    <li><b>Địa chỉ:</b> Tầng 10, Phòng số 1&2, Phú Mỹ Hưng Tower, Số 8 Hoàng Văn Thái, Phường Tân Phú,
                        Quận 7,
                        Tp. Hồ Chí Minh<br>
                        <b>Điện thoại:</b> 028 5411 0911
                    </li>
                    <li style="font-weight: bold;">Về công ty TNHH Xe Hơi Thể Thao Uy Tín</li>
                    <li><b>Địa chỉ:</b> Lô DVTM-5-6-7, đường N1 và Lô DVTM-4 Đường số 7, Khu Thương mại Nam, Khu chế
                        xuất Tân
                        Thuận, Phường Tân Thuận Đông, Quận 7, Tp. Hồ Chí Minh<br><b>Điện thoại:</b> 028 5414 1911</li>


                </ul>
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