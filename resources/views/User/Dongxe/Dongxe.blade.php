<!DOCTYPE html>
<html lang="en">

<head>
     @include('User.parts.head')
</head>

<body>
 @include('User.parts.header')

    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Các dòng xe</p>
        </div>

        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                 <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>
            </div>

            </div>
        </div>

    </section>
    <!--Dong xe-->
    <main>
        <section class="car-dx">
            <div class="car-dx-text" onclick="toggleFilter()">
                <p>Chọn lọc bởi:</p>
            </div>

            <div id="car-dx-text-seach" class="car-dx-text-seach">

                <div class="car-dx-text-seach-left">
                    <ul>
                    <li>
    <button class="filter-btn" data-filter="718"></button>718
</li>
<li>
    <button class="filter-btn" data-filter="911"></button>911
</li>
<li>
    <button class="filter-btn" data-filter="taycan"></button>Taycan
</li>
<li>
    <button class="filter-btn" data-filter="panamera"></button>Panamera
</li>
<li>
    <button class="filter-btn" data-filter="macan"></button>Macan
</li>
<li>
    <button class="filter-btn" data-filter="cayenne"></button>Cayenne
</li>

                    </ul>
                </div>
                <div class="car-dx-text-seach-left">
                    <ul>
                        <li>Thiết kế</li>
                        <li><button></button>Coupé</li>
                        <li><button></button>Cabriolet</li>
                        <li><button></button>Roadster</li>
                        <li><button></button>SUV</li>
                        <li><button></button>Sport Saloon</li>
                        <li><button></button>Sport Turismo</li>
                        <li><button></button>Cross Turismo</li>
                        <li><button></button>Targa</li>
                    </ul>
                </div>
                <div class="car-dx-text-seach-left">
                    <ul>
                        <li>Hệ truyền động</li>
                        <li><button></button>Số sàn</li>
                        <li><button></button>Tiptronic</li>
                        <li><button></button>PDK</li>
                        <li><button></button>2 cấp</li>
                        <li><button></button>1 cấp</li>
                        <li>Bố trí chuyển động</li>
                        <li><button></button>Dẫn động cầu sau</li>
                        <li><button></button>Dẫn động 4 bánh toàn phần</li>
                    </ul>
                </div>
                <div class="car-dx-text-seach-left">
                    <ul>
                        <li>Ghế</li>
                        <li><button></button>2</li>
                        <li><button></button>4</li>
                        <li><button></button>4 + 1</li>
                        <li><button></button>5</li>
                        <li><button></button>2 + 2</li>
                    </ul>
                </div>
             <div class="car-dx-text-seach-right">

    <p>Mức giá tiêu chuẩn (VNĐ)</p>

    <div class="price-range-box">
        <div class="price-range-text">
            <span id="price-min-text">0 vnđ</span>
            <span id="price-max-text">30.000.000.000 vnđ</span>
        </div>

        <div class="price-range-slider">
            <input type="range" id="priceMin" min="0" max="30000000000" step="100000000" value="0">
            <input type="range" id="priceMax" min="0" max="30000000000" step="100000000" value="30000000000">
        </div>
    </div>

    <p style="margin-top: 20px;">Công suất</p>
    <div class="car-dx-text-seach-right-item">
        <p>Hiện tất cả(hp)</p>
        <i class="ri-arrow-down-wide-line"></i>
    </div>

</div>


            </div>
        </section>
        <section class="car-dx-warning">
            <p>Lưu ý: Tất cả các dòng xe bên dưới có giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và
                thuế giá trị gia tăng. Đối với dòng xe Panamera, Cayenne, Macan và Taycan giá tiêu chuẩn bao gồm thêm
                gói dịch vụ 4 năm bảo dưỡng. Bảng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm
                mà không báo trước.</p>
        </section>
     <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 718 Cayman</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(2, 2) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}} ">
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
    <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 718 Boxster</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(0, 2) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
         <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 718 Style Edition</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(4, 2) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}}" data-price="{{ $product->price }}">
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
    <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 911 Carrera Coupé</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(6, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
      <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản 911 Carrera Cabriolet</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(11, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
     <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Taycan</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(16, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
                       @foreach($products->slice(20, 3) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
         <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Cross Turismo</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(23, 3) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}} " data-price="{{ $product->price }}">
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
     <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Panamera</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(26, 2) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}} " data-price="{{ $product->price }}">
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
     <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Macan</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(28, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}} " data-price="{{ $product->price }}">
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
    <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Macan điện</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(32, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name)}} " data-price="{{ $product->price }}">
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
      <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Cayenne</p>
            </div>
            <div class="car-dx-content-items">
                 @foreach($products->slice(36, 4) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
                       @foreach($products->slice(40, 3) as $product)
                <div class="car-dx-content-item" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
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
    <section class="car-end">
        <div class="car-end-text-one">
            <p><i class="ri-store-line"></i>Store Việt Nam 2025</p>
        </div>
        <div class="car-end-text-two">
            <p><u>Chính sách quyền riêng tư </u></p>
        </div>
    </section>



 <script src="{{asset('frontend/asset/js/dongxe.js')}}"></script>
</body>


</html>