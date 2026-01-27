<!DOCTYPE html>
<html lang="en">
@section('title', 'Dịch vụ')
<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/car-dv-1.png')}}" alt="">
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
            <p>Chương Trình Ưu Đãi Hậu Mãi</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/car-dv-2.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>
                    <li>Hãy luôn cập nhật tin tức và sự kiện mới nhất cũng như hình ảnh và videos của <br> Store Việt
                        Nam
                        tại
                        đây.</li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Dịch vụ bán hàng</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/car-dv-3.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>
                    <li style="font-weight: bold; font-size: 30px ;">Chúng tôi đặt ra những tiêu chuẩn cao cấp.<br> Cũng
                        như bạn.</li>
                    <li>Bạn muốn điều gì đó thật đặc biệt. Đó là lí do tại sao bạn lái một chiếc Porsche. Và <br>tại sao
                        bạn
                        xứng đáng nhận được một dịch vụ đặc biệt tương xứng. Tinh tế,<br> chuyên nghiệp và cực kỳ mạnh
                        mẽ.
                        Trên tất cả: dành riêng cho yêu cầu chính xác<br> của bạn. Đó chính là chuẩn Porsche.</li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Dịch vụ hậu mãi</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/car-dv-4.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>
                    <li style="font-weight: bold; font-size: 30px ;">Tất cả dành cho một: Xe của bạn.</li>
                    <li>Bất kể là dòng xe cổ điển hay hiện đại, hay dòng xe GT. Chúng tôi sẽ dành sự phục<br> vụ tốt
                        nhất
                        cho chiếc Porsche của bạn - cho việc bảo trì, bảo dưỡng và sửa chữa.<br> Và với đội ngũ Porsche
                        Genuine Parts, bạn sẽ được<br> đảm bảo rằng mọi thứ sẽ được hoàn hảo như nguyên bản ban đầu.
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
                <li>Chương Trình Ưu Đãi Hậu Mãi</li>
                <li>|</li>
                <li>Dịch vụ bán hàng</li>
                <li>|</li>
                <li> Dịch vụ hậu mãi</li>

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