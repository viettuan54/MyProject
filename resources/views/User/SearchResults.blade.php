<!DOCTYPE html>
<html lang="vi">

<head>
    @include('User.parts.head')
    <style>
        .search-page {
            width: min(1240px, calc(100% - 40px));
            margin: 38px auto 60px;
        }

        .search-page-title {
            font-size: 28px;
            font-family: 'Arial Narrow';
            margin-bottom: 10px;
        }

        .search-page-subtitle {
            font-size: 16px;
            font-family: 'Arial', sans-serif;
            color: #6b7280;
            margin-bottom: 28px;
        }

        .search-page .car-dx-content {
            margin-top: 34px;
        }

        .search-page .car-dx-content-text p {
            font-size: 34px;
            margin-bottom: 18px;
        }

        .search-page .car-dx-content-items {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .search-page .car-dx-content-item {
            margin-left: 0;
            width: calc((100% - 20px) / 2);
            min-width: 300px;
        }

        .search-page .car-dx-content-item img {
            width: 100%;
            height: 230px;
            object-fit: contain;
        }

        .search-page .car-dx-content-item li {
            list-style: none;
            margin-left: 0;
        }

        .search-page .car-dx-content-item form {
            margin-top: 3px;
        }

        .search-page .car-dx-content-item button {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
        }

        .search-page .car-dx-content-item button a {
            color: inherit;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: left;
            margin-left: 0;
        }

        .search-empty {
            background: #f5f5f5;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 30px;
            font-size: 17px;
            font-family: 'Arial', sans-serif;
        }

        @media (max-width: 768px) {
            .search-page {
                width: calc(100% - 24px);
                margin: 24px auto 42px;
            }

            .search-page-title {
                font-size: 22px;
            }

            .search-page .car-dx-content-text p {
                font-size: 26px;
            }

            .search-page .car-dx-content-item {
                width: 100%;
            }

            .search-page .car-dx-content-item img {
                height: 180px;
            }
        }
    </style>
</head>

<body>
    @include('User.parts.header')

    <main class="search-page">
        <h1 class="search-page-title">Kết quả tìm kiếm</h1>

        @if(mb_strlen($query) < 2)
            <p class="search-page-subtitle">Vui lòng nhập ít nhất 2 ký tự để tìm sản phẩm.</p>
            <div class="search-empty">Bạn có thể thử các từ khóa như: 911, Taycan, Macan, Panamera, 718, Cayenne.</div>
        @else
            <p class="search-page-subtitle">Từ khóa: "{{ $query }}" - tìm thấy {{ $products->count() }} sản phẩm.</p>

            @if($products->isEmpty())
                <div class="search-empty">Không tìm thấy sản phẩm phù hợp với từ khóa "{{ $query }}".</div>
            @else
                @foreach($productsByCategory as $category => $items)
                    <section class="car-dx-content">
                        <div class="car-dx-content-text">
                            <p><i class="ri-arrow-right-wide-line"></i> Phiên bản {{ $category }}</p>
                        </div>

                        <div class="car-dx-content-items">
                            @foreach($items as $product)
                                <div class="car-dx-content-item">
                                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                    <li>{{ $product->name }}</li>
                                    <li style="margin-top: 5px;">Giá tiêu chuẩn: {{ $product->price_display }}*</li>
                                    <li style="margin-top: 20px;">
                                        <button>
                                            <i class="ri-arrow-right-wide-line"></i>
                                            <a href="{{ $product->slug ? url('/' . ltrim($product->slug, '/')) : '#' }}">Khám phá</a>
                                        </button>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('cart.add') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" style="margin-top: 3px;">
                                                <i class="ri-shopping-cart-line"></i>Thêm giỏ hàng
                                            </button>
                                        </form>
                                    </li>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            @endif
        @endif
    </main>

    @include('User.parts.footer')
</body>

</html>
