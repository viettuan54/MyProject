<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')

{{-- Slider giữ nguyên cho đồng bộ --}}
<section class="slider">
    <div class="slider-items">
        @for($i = 1; $i <= 6; $i++)
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/images/slider'.$i.'.jpg') }}" alt="">
            </div>
        @endfor
    </div>
</section>

<main style="padding:40px;">
    <h1 style="text-align:center;margin-bottom:30px;">📦 Lịch sử đơn hàng</h1>

    @if($orders->isEmpty())
        <p style="text-align:center;font-size:18px;">
            Bạn chưa có đơn hàng nào.
        </p>
    @else
        <div class="cart-wrapper">
            <div class="cart-box" style="width:100%;">
                <table class="cart-table">
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
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>

                            <td>{{ $order->created_at->format('d/m/Y') }}</td>

                            <td>
                                {{ number_format($order->total_price,0,',','.') }} VNĐ
                            </td>

                            <td>
                                @if($order->payment_method === 'cod')
                                    COD
                                @elseif($order->payment_method === 'bank')
                                    Ngân hàng
                                @else
                                    MoMo
                                @endif
                            </td>

                            <td>
                                @if($order->status === 'pending')
                                    <span style="color:#dc2626;">Chờ duyệt</span>
                                @elseif($order->status === 'approved')
                                    <span style="color:#16a34a;">Đã duyệt</span>
                                @else
                                    <span style="color:#6b7280;">Từ chối</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('user.history.show', $order->id) }}"
                                   class="btn-back">
                                   Xem chi tiết →
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ url('/') }}" class="btn-back" style="margin-top:20px;">
                    ← Quay về trang chủ
                </a>
            </div>
        </div>
    @endif
</main>

@include('User.parts.footer')
</body>
</html>