<!DOCTYPE html>
<html lang="en">

<head>
@include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    <!--Ve store-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/store1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Dịch vụ</p>
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
        <section class="Dv-text">
            <p>Cơ hội việc làm</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/store2.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>
                    <li>Chúng tôi đang tìm kiếm những tài năng, những người trân trọng môi trường làm<br> việc chuyên
                        nghiệp và cơ hội hàng đầu để phát triển bản thân. Nếu bạn tin rằng
                        <br>mình phù hợp với những yêu cầu công việc từ Porsche và đam mê xe thể thao.<br>Hãy trở thành
                        một phần của […]
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Porsche AG</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/store3.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Dr. Ing. h. c. F. Porsche AG được thành lập từ ngày 25 tháng 4 năm 1931 bởi ôngà <br>Ferdinand
                        Porsche và có trụ sở chính đặt tại thành phố Stuttgart, Đức. Trải qua<br> 87 năm kiên định với
                        triết lý kinh doanh của thương hiệu, Porsche AG hiện là một<br> trong những nhà sản […]</li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Porsche Việt Nam</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/store4.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Thành lập từ năm 2007, Porsche đã đánh dấu gần hai thập kỷ phát triển vững<br> mạnh tại thị
                        trường Việt Nam, xác lập vị thế hàng đầu trong phân khúc ô tô thể<br> thao hạng sang. Porsche
                        Việt Nam hiện phát triển mạnh mẽ với Trung tâm<br> Porsche Sài Gòn, Trung tâm Porsche Hà […]
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Thông tin báo chí</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/store5.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Thông tin báo chí về Porsche toàn cầu cũng như Porsche Việt Nam luôn được tìm<br> thấy tại đây.
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Tin tức và Sự kiện</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/store6.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Hãy luôn cập nhật tin tức và sự kiện mới nhất cũng như hình ảnh và videos của<br>Porsche Việt
                        Nam tại đây.
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
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
                <li>Porsche AG</li>
                <li>|</li>
                <li>Porsche Việt Nam</li>
                <li>|</li>
                <li>Thông tin báo chí</li>
                <li>|</li>
                <li>Tin tức và Sự kiện</li>

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