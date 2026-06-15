<!DOCTYPE html>
<html lang="vi">

<head>
    @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')

    @php
        $newCars = [
            [
                'name' => 'Cayenne 243737',
                'images' => ['newcar1.jpg', 'newcar2.jpg'],
                'specs' => [
                    'Mã số' => '549111',
                    'Ngoại thất' => 'Trắng',
                    'Nội thất' => 'Đen - Tím',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '6.649.400.000 VNĐ',
                ],
            ],
            [
                'name' => 'Lamborghini Aventador SVJ',
                'images' => ['newcar3.jpg', 'newcar4.jpg'],
                'specs' => [
                    'Mã số' => '549222',
                    'Ngoại thất' => 'Nâu đen',
                    'Nội thất' => 'Đen',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '9.649.400.000 VNĐ',
                ],
            ],
            [
                'name' => 'McLaren 720S',
                'images' => ['newcar5.jpg', 'newcar6.jpg'],
                'specs' => [
                    'Mã số' => '549333',
                    'Ngoại thất' => 'Trắng',
                    'Nội thất' => 'Đen - cam',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '7.649.400.000 VNĐ',
                ],
            ],
            [
                'name' => 'LaFerrari Aperta',
                'images' => ['newcar7.jpg', 'newcar8.jpg'],
                'specs' => [
                    'Mã số' => '549444',
                    'Ngoại thất' => 'Đỏ',
                    'Nội thất' => 'Đen - Đỏ',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '10.649.400.000 VNĐ',
                ],
            ],
            [
                'name' => 'Koenigsegg Regera',
                'images' => ['newcar9.jpg', 'newcar10.jpg'],
                'specs' => [
                    'Mã số' => '549555',
                    'Ngoại thất' => 'Trắng',
                    'Nội thất' => 'Đen - Trắng',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '12.649.400.000 VNĐ',
                ],
            ],
            [
                'name' => 'Chevrolet Corvette Stingray C8',
                'images' => ['newcar11.jpg', 'newcar12.jpg'],
                'specs' => [
                    'Mã số' => '549666',
                    'Ngoại thất' => 'Xanh',
                    'Nội thất' => 'Đen - Xanh',
                    'Động cơ' => 'Tăng áp, V6',
                    'Dung tích (cc)' => '2.995',
                    'Công suất tối đa (hp/rpm)' => '353',
                    'Mô-men xoắn cực đại (Nm/rpm)' => '500',
                    'Thời gian tăng tốc (0-100km/h)' => '5,7',
                    'Tốc độ tối đa (km/h)' => '248',
                    'Tự trọng (DIN) (kg)' => '2.055',
                    'Giá bán' => '8.649.400.000 VNĐ',
                ],
            ],
        ];
    @endphp

    <section class="newcar-overhead">
        <div class="overhead-text">
            <p>Xe mới</p>
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

    <main class="newcar-page">
        @foreach ($newCars as $car)
            <section class="newcar-contents">
                <article class="newcar-content" style="--product-bg: url('{{ asset('frontend/asset/images/' . $car['images'][0]) }}');">
                    <div class="newcar-content-one">
                        @foreach ($car['images'] as $image)
                            <img src="{{ asset('frontend/asset/images/' . $image) }}" alt="{{ $car['name'] }}">
                        @endforeach
                    </div>

                    <div class="newcar-content-two">
                        <h2><i class="ri-arrow-right-wide-line"></i>{{ $car['name'] }}</h2>

                        <dl class="newcar-specs">
                            @foreach ($car['specs'] as $label => $value)
                                <div class="newcar-spec-row {{ $label === 'Giá bán' ? 'is-price' : '' }}">
                                    <dt>{{ $label }}</dt>
                                    <dd>{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>

                        <div class="newcar-content-two-show">
                            <button type="button"><i class="ri-arrow-right-wide-line"></i>Xem thêm</button>
                        </div>
                    </div>
                </article>
            </section>
        @endforeach
    </main>

    <main>
        @include('User.parts.conatct')
    </main>

    @include('User.parts.footer')
</body>

</html>
