<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')
    <!--Ve store-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dv-hm1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Dịch vụ hậu mãi</p>
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
        <section class="Dv-text">
            <p>Dịch Vụ Hỗ Trợ Lưu Động của Porsche</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/dv-hm2.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>
                    <li>Hỗ trợ 24/7 Dịch Vụ Hỗ Trợ Lưu Động độc quyền của Porsche đảm bảo hỗ trợ<br> 24/7 trên toàn quốc
                        trong trường hợp chiếc Porsche của bạn gặp sự cố.<br> Đây là cam kết của chúng tôi về chất lượng
                        dịch vụ hàng đầu và hoàn toàn miễn phí cho<br> tất cả xe có […]
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Đội ngũ dịch vụ và cơ sở vật chất</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/dv-hm3.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Tại Porsche Việt Nam, chúng tôi hiểu rõ và cam kết đáp ứng 100% nhu cầu của<br> bạn. Mỗi nhân
                        viên
                        trong đội ngũ của chúng tôi đều có chung niềm đam mê dành <br>cho thương hiệu xe thể thao danh
                        tiếng
                        này. Không quá phóng đại khi nói rằng<br> chúng tôi mang “dòng máu Porsche” trong huyết mạch của
                        mình. Mỗi […]</li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Bảo dưỡng</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/dv-hm4.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Porsche cung cấp nhiều cấp độ bảo dưỡng phù hợp với từng tình trạng xe khác<br> nhau dựa trên
                        cây số
                        và thời gian sử dụng. Các hạng mục của mỗi cấp độ bảo<br> dưỡng (hoặc dịch vụ) được thiết kế
                        riêng
                        cho từng dòng xe, nhằm đảm bảo xe<br> Porsche của bạn luôn trong […]
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Bộ sưu tập phong cách sống Porsche</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/dv-hm5.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Bộ sưu tập thời trang và phụ kiện Porsche giới thiệu đến người sử dụng xe và <br>người hâm mộ
                        các
                        sản phẩm trang phục thể thao, túi xách thời trang, hành lý, xe<br> mô hình, …
                    </li>
                    <li><button><i class="ri-arrow-right-wide-line"></i>Xem thêm</button></li>
                </ul>
            </div>
        </section>
        <section class="Dv-text">
            <p>Các dịch vụ khác</p>
        </section>
        <section class="Dv-items">
            <div class="Dv-item-1">
                <img src="{{asset('frontend/asset/images/dv-hm6.jpg')}}" alt="">
            </div>
            <div class="Dv-item-2">
                <ul>

                    <li>Bên cạnh các dịch vụ sửa chữa và bảo dưỡng tiêu chuẩn, chúng tôi còn cung cấp <br>một loạt các
                        dịch
                        vụ và sản phẩm đặc biệt được thiết kế riêng cho chiếc Porsche<br> của bạn và phù hợp với các
                        điều
                        kiện vận hành tại Việt Nam, để đảm bảo hiệu suất <br>tối đa và […]
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
                <li>Dịch Vụ Hỗ Trợ Lưu Động của Porsche</li>
                <li>|</li>
                <li>Đội ngũ dịch vụ và cơ sở vật chất </li>
                <li>|</li>
                <li>Bảo dưỡng</li>
                <li>|</li>
                <li>Bảo hành Bộ sưu tập phong cách sống Porsche</li>
                <li>|</li>
                <li>Các dịch vụ khác</li>

            </ul>

        </section>
   
        <!--Contact-->
        @include('User.parts.conatct')

    </main>
<!--FOOTER-->
@include('User.parts.footer')
</body>
</html>