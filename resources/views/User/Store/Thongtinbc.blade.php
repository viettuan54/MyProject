<!DOCTYPE html>
<html lang="en">

<head>
   @include('User.parts.head')
</head>

<body>
  @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/tt-bc1.jpg ')}}" alt="">
    </section>
    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Tin tức và Sự kiện</p>
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
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc2.jpg ')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Độc bản. Kinh điển. Porsche 911 mới chính thức ra mắt
                                tại Hà Nội
                                <br>22/03/2025</a></li>
                        <li style="margin-top: 30px;"><a href="">


                                Thiết kế vượt thời gian với hiệu suất và tính năng động tăng cường Porsche Việt Nam ra
                                mắt phiên bản nâng cấp của dòng xe 911 mới trong sự kiện triển lãm nghệ thuật tại Bảo
                                tàng Mỹ thuật Việt Nam ở Hà Nội Động cơ boxer sáu xi-lanh của 911 Carrera được cải
                                [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc3.jpg ')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href="">Porsche Việt Nam giới thiệu Macan thuần điện hoàn toàn mới</a><br> 16/12/2024
                        </li>
                        <li style="margin-top: 30px;"><a href="">
                                Bản sắc. Thời thượng. Porsche Macan điện mới xuất hiện tại Lễ hội Âm nhạc HOZO 2024.
                                Porsche hợp tác cùng HOZO 2024 với vai trò là đối tác xe độc quyền, giới thiệu dòng xe
                                Macan điện hoàn toàn mới tại Lễ hội Âm nhạc Quốc tế quy mô bậc nhất tại Việt Nam.
                                [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc4.jpg ')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Choáng ngợp cảm xúc: Porsche Việt Nam giới thiệu dòng xe Taycan mới
                                <br> 21/10/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Mạnh hơn: Công suất sạc lên tới 320 kW. Thu hồi động năng lên tới 400 kW ở tốc độ cao
                                Nhanh hơn: Khả năng tăng tốc từ 0 - 100 km/giờ nhanh hơn, chỉ trong 2,4 giây trên phiên
                                bản
                                Taycan Turbo S Xa hơn: Phạm vi di chuyển tối đa đạt 678 km [...]</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc-5.jpg')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Thanh lịch và Bản lĩnh: Panamera mới đã có mặt tại Việt Nam<br> 08/10/2024</a>
                        </li>
                        <li style="margin-top: 30px;"><a href="">




                                Hiện đại hơn, sang trọng hơn và hiệu quả hơn: Panamera thế hệ mới Panamera mới đã ra mắt
                                cùng các biến thể e-hybrid lần đầu được giới thiệu tại Việt Nam Thiết kế ngoại thất tinh
                                tế bậc nhất phân khúc xe sang trọng, nội thất Panamera nổi trội với thiết kế tập trung
                                [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc6.jpg ')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href=""> Porsche dự kiến ra mắt bộ ba hệ thống truyền động cho dòng xe Cayenne trong thập
                                kỷ
                                tới<br>07/08/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">


                                Chương trình thử nghiệm mẫu xe thuần điện đã bắt đầu Kế hoạch phát triển động cơ đốt
                                trong và động cơ hybrid được đẩy mạnh Xây dựng danh mục sản phẩm đa dạng sau năm 2030
                                Thế hệ thứ tư của Porsche Cayenne sẽ là xe thuần điện. Chương trình thử nghiệm khắt khe
                                [...]</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tt-sk">
            <div class="tt-sk-items">
                <div class="tt-sk-item-left">
                    <a href=""><img src="{{asset('frontend/asset/images/tt-bc7.jpg ')}}" alt=""></a>
                </div>
                <div class="tt-sk-item-right">
                    <ul>
                        <li><a href="">Porsche đạt doanh số 155.945 xe trong nửa đầu năm<br> 19/07/2024</a></li>
                        <li style="margin-top: 30px;"><a href="">
                                Porsche đạt doanh số 155.945 xe trong nửa đầu năm Doanh số ổn định trong năm ra mắt sản
                                phẩm Doanh số tại châu Âu tăng trưởng ổn định, thị trường Bắc Mỹ tăng mạnh trong quý 2
                                Cấu trúc bán hàng cân đối tại các khu vực kinh doanh riêng lẻ Nhu cầu đối [...]</a></li>
                    </ul>
                </div>
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
      
        <!--Contact-->
        @include('User.parts.conatct')

    </main>
<!--FOOTER-->
@include('User.parts.footer')
</body>
</html>