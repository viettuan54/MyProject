<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')

</head>

<body>
@include('User.parts.header')

  <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider1.jpg')}}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider2.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider3.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider4.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider5.jpg')}}" alt="">

            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/slider6.jpg')}}" alt="">

            </div>
        </div>
        <div class="slider-arrow">
            <i class="ri-arrow-right-wide-line"></i>
            <i class="ri-arrow-left-wide-line"></i>
        </div>
        <!---Tao cac cham duoi slider-->
        <div class="slider-dots"></div>
    </section>
        <!--containre-->
        <section class="content">

            <div class="content-one">
                <a href="http://127.0.0.1:8000/xemoi" ><p><i class="ri-roadster-fill"></i> Xe mới</p></a>
            </div>
            <div class="content-one">
                <a href="http://127.0.0.1:8000/dongxe" ><p><i class="ri-file-list-2-line"></i> Bảng giá</p></a>
            </div>
            <div class="content-one">
                  <a href="http://127.0.0.1:8000/trungtam" ><p><i class="ri-store-line"></i> Trung tâm</p></a>
            </div>
            <div class="content-one">
                 <a href="http://127.0.0.1:8000/dichvu" ><p><i class="ri-service-line"></i> Dịch vụ</p></a>
               
            </div>

        </section>
<main style="padding:40px;max-width:1200px;margin:auto;">

    <h1 class="order-title">
        <i class="ri-info-card-line"></i> Chi tiết đơn hàng #{{ $order->id }}
    </h1>

    <div class="cart-wrapper">

        {{-- THÔNG TIN KHÁCH HÀNG --}}
        <div class="cart-box" style="width:100%;margin-bottom:30px; font-family: 'Arial Narrow';">
            <h3><i class="ri-news-line"></i> Thông tin người nhận</h3>

            <div class="info-grid">
                <div class="info-item">
                    <span>Họ tên</span>
                    {{ $order->customer_name }}
                </div>

                <div class="info-item">
                    <span>Số điện thoại</span>
                    {{ $order->phone }}
                </div>

                <div class="info-item">
                    <span>Email</span>
                    {{ $order->email ?? 'Không có' }}
                </div>

                <div class="info-item">
                    <span>Địa chỉ</span>
                    {{ $order->address }}
                </div>

                <div class="info-item">
                    <span>Hình thức thanh toán</span>
                    @if($order->payment_method === 'cod')
                        Thanh toán khi nhận xe (COD)
                    @elseif($order->payment_method === 'bank')
                        Chuyển khoản ngân hàng
                    @else
                        Ví MoMo
                    @endif
                </div>

                <div class="info-item">
                    <span>Trạng thái</span>
                    @if($order->status === 'pending')
                        ⏳ Chờ duyệt
                    @elseif($order->status === 'approved')
                        ✅ Đã duyệt
                    @else
                        ❌ Đã hủy
                    @endif
                </div>
            </div>
        </div>

        {{-- DANH SÁCH SẢN PHẨM --}}
        <div class="cart-box" style="width:100%; font-family: 'Arial Narrow';">
            <h3><i class="ri-roadster-fill"></i> Sản phẩm đã mua</h3>

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Tên xe</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tạm tính</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ number_format($item->price,0,',','.') }} VNĐ</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                {{ number_format($item->price * $item->quantity,0,',','.') }} VNĐ
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-box">
                Tổng tiền:
                <span>{{ number_format($order->total_price,0,',','.') }} VNĐ</span>
            </div>

            <a href="{{ route('user.history') }}" class="back-link">
                ← Quay lại lịch sử đơn hàng
            </a>
        </div>

    </div>
</main>

@include('User.parts.footer')
</body>
<script src="{{asset('frontend/asset/js/script.js')}}"></script>
</html>