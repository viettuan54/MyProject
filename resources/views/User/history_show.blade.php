<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')

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
    <h1 style="text-align:center;margin-bottom:30px;">
        🧾 Chi tiết đơn hàng #{{ $order->id }}
    </h1>

    {{-- Thông tin đơn --}}
    <div class="cart-wrapper">
        <div class="cart-box" style="width:100%;margin-bottom:30px;">
            <h3>📋 Thông tin người nhận</h3>

            <p><strong>Họ tên:</strong> {{ $order->customer_name }}</p>
            <p><strong>SĐT:</strong> {{ $order->phone }}</p>
            <p><strong>Email:</strong> {{ $order->email ?? 'Không có' }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            <p>
                <strong>Thanh toán:</strong>
                @if($order->payment_method === 'cod')
                    Thanh toán khi nhận xe (COD)
                @elseif($order->payment_method === 'bank')
                    Chuyển khoản ngân hàng
                @else
                    Ví MoMo
                @endif
            </p>
        </div>

        {{-- Danh sách sản phẩm --}}
        <div class="cart-box" style="width:100%;">
            <h3>🚗 Sản phẩm đã mua</h3>

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

            <h3 style="text-align:right;margin-top:20px;">
                Tổng tiền:
                <span style="color:#16a34a;">
                    {{ number_format($order->total_price,0,',','.') }} VNĐ
                </span>
            </h3>

            <a href="{{ route('user.history') }}" class="btn-back">
                ← Quay lại lịch sử đơn hàng
            </a>
        </div>
    </div>
</main>

@include('User.parts.footer')
</body>
</html>