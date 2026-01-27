<!DOCTYPE html>
<html lang="en">

<head>
 @include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/Porsche-AG-banner.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Store AG</p>
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
                    <li>Dr. Ing. h. c. F. Porsche AG được thành lập từ ngày 25 tháng 4 năm 1931 bởi ông Ferdinand
                        Porsche và
                        có trụ sở chính đặt tại thành phố Stuttgart, Đức. Trải qua 87 năm kiên định với triết lý kinh
                        doanh
                        của thương hiệu, Porsche AG hiện là một trong những nhà sản xuất xe thể thao hàng đầu thế giới
                        với
                        các dòng xe chủ lực và hấp dẫn như huyền thoại 911, 718 Boxster, 718 Cayman, Gran Turismo
                        Panamera,
                        SUV Cayenne, SUV cỡ trung Macan.</li>
                    <li>Với sự phát triển mạnh mẽ về kết quả hoạt động, hệ thống phân phối của Porsche ngày càng được mở
                        rộng bao gồm 8 thị trường trọng yếu: Châu Âu, Đức, Châu Mỹ, Mỹ, Châu Á Thái Bình Dương, Châu
                        Phi,
                        Trung Đông và Trung Quốc. Tất các dòng xe Porsche đều được sản xuất tại hai nhà máy chính tại ở
                        Đức:
                        Nhà máy tại Zuffenhausen và nhà máy Leipzig. Dây chuyền hiện đại này có khả năng sản xuất hơn
                        50.000
                        xe một năm, tất cả đều tuân thủ những tiêu chuẩn khắt khe và toàn cầu của Porsche.</li>
                    <li>Tại Porsche, việc đầu tư vào công nghệ di động của tương lai bao gồm các công nghệ mới và điện
                        khí
                        hóa cũng nhiều và quan trọng như việc tạo ra những mẫu xe thể thao thuần khiết đầy cảm xúc. Bên
                        cạnh
                        đó, Porsche cũng đầu tư đáng kể vào việc phát triển các lĩnh vực kinh doanh mới.</li>
                    <li>Đặc biệt, phiên bản thương mại của dòng xe vận hành hoàn toàn bằng điện đầu tiên của Porsche có
                        tên
                        gọi là Taycan, sẽ được chính thức giới thiệu trong năm tới. Một lần nữa, Porsche lại chế tạo
                        những
                        gì Porsche làm tốt nhất, tạo ra những mẫu xe thể thao chạy bằng điện chưa từng có trên thê giới.
                        Chỉ
                        trong vòng 2 năm nữa, chiếc xe chạy hoàn toàn bằng điện đầu tiên này sẽ được ra mắt tại thị
                        trường
                        Việt Nam.</li>
                    <li>Liên tục thành công với kết quả kinh doanh kỷ lục trong những nằm gần đây, Porsche luôn là nhà
                        sản
                        xuất xe ô tô có lợi nhuận cao nhất trên thế giới, ngày càng vững bước trên con đường thành công
                        với
                        lực lượng lao động tăng hơn 30.785 nhân viên. Mục tiêu của Porsche không chỉ đạt kỷ lục về doanh
                        số
                        mà còn đặt tính bền vững vào sự tăng trưởng giá trị gia tăng và việc làm ổn định.</li>

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