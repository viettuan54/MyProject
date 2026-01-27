<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dx-911-1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Dòng xe 911</p>
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
        <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 911 Carrera Coupé</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(6, 4) as $product)
                <div class="car-dx-content-item">
                    <img src="{{asset($product->main_image )}}" alt="">
                    <Li>{{ $product->name }}</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: {{ $product->price_display }}*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i><a
                                href="{{ url( $product->slug) }}">Khám phá</a></button></li>
                    <li><button style="margin-top: 3px;"><i class="ri-shopping-cart-line"></i>Thêm giỏ hàng</button>
                    </li>

                </div>
                  @endforeach
            </div>
            <section class="car-dx-content">
                <div class="car-dx-content-items">
                       @foreach($products->slice(10, 1) as $product)
                <div class="car-dx-content-item">
                    <img src="{{asset($product->main_image )}}" alt="">
                    <Li>{{ $product->name }}</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: {{ $product->price_display }}*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i><a
                                href="{{ url( $product->slug) }}">Khám phá</a></button></li>
                    <li><button style="margin-top: 3px;"><i class="ri-shopping-cart-line"></i>Thêm giỏ hàng</button>
                    </li>

                </div>
                  @endforeach
                </div>
            </section>
        </section>
         <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 911 Carrera Cabriolet</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(11, 4) as $product)
                <div class="car-dx-content-item">
                    <img src="{{asset($product->main_image )}}" alt="">
                    <Li>{{ $product->name }}</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: {{ $product->price_display }}*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i><a
                                href="{{ url( $product->slug) }}">Khám phá</a></button></li>
                    <li><button style="margin-top: 3px;"><i class="ri-shopping-cart-line"></i>Thêm giỏ hàng</button>
                    </li>

                </div>
                  @endforeach
            </div>
            <section class="car-dx-content">
                <div class="car-dx-content-items">
                       @foreach($products->slice(15, 1) as $product)
                <div class="car-dx-content-item">
                    <img src="{{asset($product->main_image )}}" alt="">
                    <Li>{{ $product->name }}</Li>
                    <li style="margin-top: 5px;">Giá tiêu chuẩn: {{ $product->price_display }}*</li>
                    <li style="margin-top: 20px;"><button><i class="ri-arrow-right-wide-line"></i><a
                                href="{{ url( $product->slug) }}">Khám phá</a></button></li>
                    <li><button style="margin-top: 3px;"><i class="ri-shopping-cart-line"></i>Thêm giỏ hàng</button>
                    </li>

                </div>
                  @endforeach
                </div>
            </section>
        </section>
            <section class="Dv-text" style="margin-top: 100px;">
                <p>Tìm hiểu thêm</p>
            </section>
            <section class="Dv-end">
                <ul>
                    <li>718</li>
                    <li>|</li>
                    <li>911</li>
                    <li>|</li>
                    <li> Taycan</li>
                    <li>|</li>
                    <li> Panamera </li>
                    <li>|</li>
                    <li> Macan</li>
                    <li>|</li>
                    <li>Cayenne</li>

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
     <script src="{{asset('frontend/asset/js/dongxe.js')}}"></script>
</html>