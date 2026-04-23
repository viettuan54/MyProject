<!DOCTYPE html>
<html lang="en">

<head>
  @include('User.parts.head')
</head>

<body>
   @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dx-pm1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Dòng xe Panamera</p>
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
                <p><i class="ri-arrow-right-wide-line"></i>Phiên bản Panamera</p>
            </div>
            <div class="car-dx-content-items">
                @foreach($products->slice(26, 2) as $product)
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