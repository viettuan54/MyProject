<!DOCTYPE html>
<html lang="en">

<head>
   @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/dv-pk1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Phụ kiện Tequipment</p>
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
                    <li>Porsche luôn thiết lập tiêu chuẩn. Trong quá trình phát triển xe và cung cấp các tùy chọn cá
                        nhân hóa với hàng loạt phụ kiện đa dạng. Từ bộ mâm xe bằng nhôm thể thao, các hệ thống ống xả
                        thể thao độc đáo, các bộ ốp nội thất đẳng cấp, đến các tùy chọn đa phương tiện hay các sản phẩm
                        chăm sóc xe. Danh mục phụ kiện Tequipment cung cấp mọi thứ bạn cần để tăng thêm nét đặc sắc
                        riêng cho chiếc Porsche của mình.</li>
                    <li>Các nguyên tắc làm nên những chiếc xe độc đáo của chúng tôi, cũng đồng thời được áp dụng vào các
                        sản phẩm của Porsche Tequipment: phát triển, thử nghiệm và kiểm định tại Weissach, Đức bởi các
                        kỹ sư và nhà thiết kế của Porsche, những người đã tạo nên những chiếc xe huyền thoại của chúng
                        tôi. Đây là các sản phẩm chất lượng cao giúp bạn cá nhân hóa chiếc Porsche của mình theo sở
                        thích. Hơn thế nữa, việc lắp đặt các sản phẩm Tequipment không ảnh hưởng đến việc bảo hành xe
                        của bạn.</li>
                    <li>Để biết thêm thông tin về Porsche Tequipment và toàn bộ sản phẩm, vui lòng tham khảo website của
                        chúng tôi, các cuốn giới thiệu Tequipment cho từng dòng xe cụ thể (có sẵn tại các Trung Tâm
                        Porsche) hoặc liên hệ Đội Ngũ Dịch Vụ để được hỗ trợ cá nhân hóa chiếc Porsche của bạn.</li>


                </ul>
            </div>
            <div class="dv-pk">
                <button><i class="ri-arrow-right-wide-line"></i>Tìm kiếm phụ kiện Tequipment</button>
            </div>

        </section>



        <section class="Dv-text">
            <p>Tìm hiểu thêm</p>
        </section>
        <section class="Dv-end">
            <ul>
                <li>Phụ kiện Tequipment </li>
                <li>|</li>
                <li>Phụ tùng chính hãng</li>


            </ul>

        </section>

        <!--Contact-->
 @include('User.parts.conatct')

    </main>
<!--FOOTER-->
@include('User.parts.footer')
</body>
</html>