<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dx-mc1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Dòng xe Macan</p>
        </div>

       <div class="overhead-menu">
            <button type="button" class="newcar-menu-button" aria-label="Mở menu">
                <i class="ri-menu-line"></i>
            </button>
            <div class="newcar-dropdown-menu">
                <a class="newcar-menu-item" href="{{ url('/') }}">
                    <span>Trang chủ</span>
                    <i class="ri-arrow-up-wide-line"></i>
                </a>
                <a class="newcar-menu-item" href="{{ url('/dongxe') }}">
                    <span>Về đầu trang</span>
                    <i class="ri-arrow-up-wide-line"></i>
                </a>
            </div>
        </div>

    </section>
    <main>
        <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Macan</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(28, 4) as $product)
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
        <section class="car-dx-content">
            <div class="car-dx-content-text">
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Macan điện</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(32, 4) as $product)
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
     
        <!--Contact-->
  @include('User.parts.conatct')

    </main>
<!--FOOTER-->
@include('User.parts.footer')
</body>
     <script src="{{asset('frontend/asset/js/dongxe.js')}}"></script>
</html>