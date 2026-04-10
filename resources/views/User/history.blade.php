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
<main class="history-page">

    <h1 class="history-title">
        <i class="ri-file-list-line"></i> Lịch sử mua
    </h1>

    @if ($orders->isEmpty())
        <div class="history-empty">
            <p>Bạn chưa có đơn hàng nào.</p>
            <a href="{{ url('/') }}" class="btn-back">
                Quay về trang chủ
            </a>
        </div>
    @else
        <div class="history-wrapper">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->id }}</strong></td>

                            <td>{{ $order->created_at->format('d/m/Y') }}</td>

                            <td class="price">
                                {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
                            </td>

                            <td>
                                @switch($order->payment_method)
                                    @case('cod') COD @break
                                    @case('bank') Ngân hàng @break
                                    @default MoMo
                                @endswitch
                            </td>

                            <td>
                                @if ($order->status === 'pending')
                                    <span class="status pending">Chờ duyệt</span>
                                @elseif ($order->status === 'approved')
                                    <span class="status approved">Đã duyệt</span>
                                @elseif ($order->status === 'cancelled')
                                    <span class="status cancelled">Đã hủy</span>
                                @else
                                    <span class="status rejected">Từ chối</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('user.history.show', $order->id) }}"
                                   class="btn-detail">
                                    Xem 
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="history-back">
                <a href="{{ url('/') }}" class="btn-back">
                    <p>Quay về trang chủ</p>
                </a>
            </div>
        </div>
    @endif

</main>

@include('User.parts.footer')
</body>
<script src="{{asset('frontend/asset/js/script.js')}}"></script>
</html>