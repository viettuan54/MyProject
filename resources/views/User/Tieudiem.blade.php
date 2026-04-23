<!DOCTYPE html>
<html lang="en">

<head>
@include('User.parts.head')
</head>

<body>
@include('User.parts.header')
    <!--Subtieudiem-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/subtd1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Trải nghiệm có một không hai tại Porsche Leipzig </p>
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
        <section class="subtd-video">
            <video controls>
                <source
                    src="https://porsche-vietnam.vn/wp-content/uploads/2024/09/Porsche-Experience-Centre-Leipzig-video-VIE-final.mp4"
                    type="video/mp4">

            </video>
        </section>
        <section class="subtd-text">
            <ul>
                <li>Chào mừng bạn bước vào thế giới cuốn hút của Porsche.</li>
                <li style="margin-top: 15px;">Bạn sẽ được chiêm ngưỡng nghệ thuật chế tác ô tô ngay tại nhà máy, nơi
                    chúng tôi biến giấc mơ xe thể
                    thao của bạn thành</li>
                <li>hiện thực và tận hưởng sự phấn khích khi trực tiếp cầm lái những mẫu xe yêu thích trên đường đua
                    huyền
                    thoại nước Đức.</li>
                <li style="margin-top: 15px;">Những cuộc phiêu lưu không thể bỏ lỡ tại Trung tâm Trải nghiệm Porsche
                    Leipzig đang chờ đón chủ nhân
                    của
                    tuyệt phẩm xe</li>
                <li>thể thao Porsche.</li>
                <li style="margin-top: 25px;"><button>Tìm hiểu Trung tâm Trải nghiệm Porsche Leipzig</button></li>
            </ul>

        </section>

   
        <!--Contact-->
       @include('User.parts.conatct')
    </main>
<!--FOOTER-->
    @include('User.parts.footer')
</body>
</html>