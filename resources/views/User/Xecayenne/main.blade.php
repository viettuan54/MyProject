 @if (session('success'))
    <div id="success-popup" class="success-popup">
        {{ session('success') }}
    </div>
    
@endif

 <main>
        <section class="kp_718_1_text_one">
            <h1>{{ $product->name }}</h1>
            <p>Giá tiêu chuẩn{{ $product->price_display }}*</p>
            <p style="margin-top: 30px;">* Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị
                gia tăng. Đối với dòng xe
                Panamera,<br> Cayenne, Macan và Taycan giá tiêu chuẩn bao gồm thêm gói dịch vụ 4 năm bảo dưỡng. Bảng
                giá,
                thông số kỹ thuật và <Br> hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
            <div class="kp_718_1_text_two">
                <ul>
                    <li><b>{{ $product->power }}</b><br>Công suất</li>
                    <li>|</li>
                    <li><b>{{ $product->acceleration_sec }}giây </b><br>Tăng tốc từ 0 - 100 km/giờ</li>
                    <li>|</li>
                    <li><b>{{ $product->top_speed_kmh }} km/giờ</b><br>Tốc độ tối đa</li>
                    <li>|</li>
                </ul>

            </div>

        </section>
        <section class="kp_718_1_conten">
            <h1>Thông số kỹ thuật</h1>
            <div class="kp_718_1_conten_all">
                <div class="kp_718_1_conten_left">
                    <img src="{{asset($product->main_image)}}" alt="">
                </div>
                <div class="kp_718_1_conten_right">
                    <ul>
                        <li><b>Công suất</b> <span></span>{{ $product->power }}</li>
                        <hr>
                        <li><b>Mô men xoắn cực đại</b><span>{{ $product->torque_nm }} Nm</span></li>
                        <hr>
                        <li><b>Tăng tốc từ 0 - 100 km/giờ (0 - 62 dặm/giờ)</b> <span>{{ $product->acceleration_sec }} giây</span></li>
                        <hr>
                        <li><b>Tốc độ tối đa</b> <span>{{ $product->top_speed_kmh }} km/giờ</span></li>
                        <hr>
                        <li><b>Mức tiêu thụ kết hợp</b> <span>{{$product->consumption_l_per_100km}} (lít/100km)</span></li>
                        <hr>
                        <li><b>Chiều dài xe</b> <span> {{ $product->length_mm }} mm</span></li>
                        <hr>
                        <li><b>Chiều cao xe </b><span></span>{{ $product->height_mm }} mm</li>
                        <hr>
                        <li><b>Giá tiêu chuẩn</b><span>{{ $product->price_display }}*</span></li>
                    </ul>
                    <p>Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Đối với
                        dòng xe Panamera, Cayenne, Macan và Taycan giá tiêu chuẩn bao gồm thêm gói dịch vụ 4 năm bảo
                        dưỡng. Bảng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không
                        báo
                        trước.</p>
                    <hr style="margin-top: 20px;">
                    <form class="add-to-cart-form" action="{{ route('cart.add') }}" method="POST">
                        @csrf
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="quantity-container">
                            <button type="button" onclick="decreaseQuantity()">-</button>
                            <input type="number"
                                   id="quantity"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   style="width: 60px; text-align: center;">
                            <button type="button" onclick="increaseQuantity()">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">THÊM VÀO GIỎ HÀNG</button>
                    </form>
                </div>

            </div>
        </section>
    @php
        $gallery = json_decode($product->gallery, true) ?? [];
    @endphp
       <section class="kp_718_1_end">
            <h1>Gallery</h1>
            <div class="kp_718_1_end_all">
                <div class="kp_718_1_end_left">
                    <div class="kp_718_1_end_left_one">
                        <div class="kp_718_1_end_left_one_sub">
                            <img src="{{asset( ($gallery[0] ?? 'default.jpg')) }}" alt="">

                        </div>
                        <div class="kp_718_1_end_left_one_sub">
                            <img src="{{asset(($gallery[1] ?? 'default.jpg')) }}" alt="">

                        </div>

                    </div>
                    <div class="kp_718_1_end_left_two">
                        <img src="{{asset(($gallery[2] ?? 'default.jpg')) }}" alt="">

                    </div>

                </div>
                <div class="kp_718_1_end_right">
                    <div class="kp_718_1_end_right_one">
                        <img src="{{ asset(($gallery[3] ?? 'default.jpg')) }}" alt="">

                    </div>
                    <div class="kp_718_1_end_right_two">
                        <div class="kp_718_1_end_right_two_sub">
                            <img src="{{ asset(($gallery[4] ?? 'default.jpg')) }}" alt="">

                        </div>
                        <div class="kp_718_1_end_right_two_sub">
                            <img src="{{ asset(($gallery[5] ?? 'default.jpg')) }}" alt="">

                        </div>

                    </div>


                </div>

            </div>
        </section>
        @include('User.parts.product-reviews', ['product' => $product])
    </main>
