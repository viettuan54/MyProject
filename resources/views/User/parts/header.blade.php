<header class="luxury-header">
    <div class="header-container">
        <!-- Top Bar -->
        <div class="header-topbar">
            <div class="topbar-left">
                <a href="{{ url('/trungtamsg') }}" class="topbar-link">
                    <i class="ri-map-pin-line"></i>
                    <span>Tìm showroom</span>
                </a>
                <a href="#" class="topbar-link chatbox-trigger">
                    <i class="ri-customer-service-line"></i>
                    <span>Hỗ trợ</span>
                </a>
                <a href="{{ url('/kenh-tro-truyen') }}" class="topbar-link">
                    <i class="ri-message-3-line"></i>
                    <span>Kênh trò chuyện</span>
                </a>
            </div>
            <div class="topbar-right">
                <!-- Search -->
                <div class="header-search-top">
                    <button class="search-toggle">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="search-overlay">
                        <div class="search-container">
                            <input type="text" id="searchInput" placeholder="Tìm xe, dịch vụ...">
                            <button class="search-close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <div class="search-results" id="searchResults">
                            <div class="search-suggestions">
                                <div class="search-suggestion-item" onclick="search('911')">
                                    <i class="ri-fire-line"></i> 911 Carrera
                                </div>
                                <div class="search-suggestion-item" onclick="search('Taycan')">
                                    <i class="ri-fire-line"></i> Taycan
                                </div>
                                <div class="search-suggestion-item" onclick="search('Macan')">
                                    <i class="ri-fire-line"></i> Macan
                                </div>
                                <div class="search-suggestion-item" onclick="search('Panamera')">
                                    <i class="ri-fire-line"></i> Panamera
                                </div>
                                <div class="search-suggestion-item" onclick="search('718')">
                                    <i class="ri-fire-line"></i> 718
                                </div>
                                <div class="search-suggestion-item" onclick="search('Cayenne')">
                                    <i class="ri-fire-line"></i> Cayenne
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cart -->
                <a href="{{ url('/cart') }}" class="topbar-icon cart-icon">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span class="cart-badge">{{ collect(session('cart', []))->sum('quantity') }}</span>
                </a>
                
                <!-- User -->
                <div class="header-user-menu">
                    @auth
                        @if(Auth::user()->avatar && file_exists(public_path('storage/avatars/' . Auth::user()->avatar)))
                            <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}"
                                 alt="User" class="user-avatar-top">
                        @else
                            <div class="user-icon-top">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif
                    @else
                        <div class="user-icon-top">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    @endauth

                    <div class="user-dropdown-menu">
                        @guest
                            <a href="{{ url('/dangnhap') }}" class="dropdown-item">
                                <i class="ri-login-circle-line"></i>
                                <span>Đăng nhập</span>
                            </a>
                            <a href="{{ url('/dangki') }}" class="dropdown-item">
                                <i class="ri-user-add-line"></i>
                                <span>Đăng ký</span>
                            </a>
                        @endguest

                        @auth
                            <div class="dropdown-header">
                                <strong>{{ Auth::user()->name }}</strong>
                                <span class="user-email">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/ttuser') }}" class="dropdown-item">
                                <i class="ri-user-line"></i>
                                <span>Thông tin cá nhân</span>
                            </a>
                            <a href="{{ route('user.history') }}" class="dropdown-item">
                                <i class="ri-file-list-3-line"></i>
                                <span>Lịch sử đơn hàng</span>
                            </a>
                            @if(Auth::user()->role === 'admin')
                                <div class="dropdown-divider"></div>
                                <a href="{{ url('/admin_dashboard') }}" class="dropdown-item admin-item">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Quản lý</span>
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ url('/dangxuat') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout-item">
                                    <i class="ri-logout-circle-line"></i>
                                    <span>Đăng xuất</span>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="header-main">
            <!-- Logo -->
            <div class="header-logo-center">
                <a href="{{ url('/') }}">
                    <img src="{{asset('frontend/asset/images/logo.png')}}" alt="Porsche">
                </a>
            </div>

            <!-- Navigation -->
            <nav class="header-nav">
                <ul class="nav-menu">
                    <!-- Các dòng xe -->
                    <li class="nav-item has-mega-menu">
                        <a href="{{ url('/dongxe') }}" class="nav-link">Các dòng xe</a>
                        <div class="car-models-mega-menu">
                            <div class="car-mega-menu-container">

                                <!-- ===== CỘT 1: SIDEBAR DANH SÁCH DÒNG XE ===== -->
                                <div class="car-sidebar">
                                    <a href="{{ url('/dongxe718') }}" class="car-sidebar-item active" data-car="718" style="text-decoration: none;">
                                        <span class="car-sidebar-name">718</span>
                                        <img src="{{asset('frontend/asset/images/submenu-1.png')}}" alt="718" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                    <a href="{{ url('/dongxe911') }}" class="car-sidebar-item" data-car="911" style="text-decoration: none;">
                                        <span class="car-sidebar-name">911</span>
                                        <img src="{{asset('frontend/asset/images/submenu-2.png')}}" alt="911" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                    <a href="{{ url('/dongxetaycan') }}" class="car-sidebar-item" data-car="taycan" style="text-decoration: none;">
                                        <span class="car-sidebar-name">Taycan</span>
                                        <img src="{{asset('frontend/asset/images/submenu-3.png')}}" alt="Taycan" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                    <a href="{{ url('/dongxepana') }}" class="car-sidebar-item" data-car="panamera" style="text-decoration: none;">
                                        <span class="car-sidebar-name">Panamera</span>
                                        <img src="{{asset('frontend/asset/images/submenu-4.png')}}" alt="Panamera" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                    <a href="{{ url('/dongxemacan') }}" class="car-sidebar-item" data-car="macan" style="text-decoration: none;">
                                        <span class="car-sidebar-name">Macan</span>
                                        <img src="{{asset('frontend/asset/images/submenu-5.png')}}" alt="Macan" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                    <a href="{{ url('/dongxecayne') }}" class="car-sidebar-item" data-car="cayenne" style="text-decoration: none;">
                                        <span class="car-sidebar-name">Cayenne</span>
                                        <img src="{{asset('frontend/asset/images/submenu-6.png')}}" alt="Cayenne" class="car-sidebar-thumb">
                                        <i class="ri-arrow-right-s-line car-sidebar-arrow"></i>
                                    </a>
                                </div>

                                <!-- ===== CỘT 2: DANH SÁCH PHIÊN BẢN ===== -->
                                <div class="car-versions-column">
                                    <!-- 718 Versions -->
                                    <div class="car-versions-pane active" data-car="718">
                                        <a href="{{ url('/dongxe718') }}" class="version-link"><span>Phiên bản 718 Cayman</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxe718') }}" class="version-link"><span>Phiên bản 718 Boxster</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxe718') }}" class="version-link"><span>Phiên bản 718 Style Edition</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    <!-- 911 Versions -->
                                    <div class="car-versions-pane" data-car="911">
                                        <a href="{{ url('/dongxe911') }}" class="version-link"><span>911 Carrera</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxe911') }}" class="version-link"><span>911 Carrera S</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxe911') }}" class="version-link"><span>911 Targa 4</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxe911') }}" class="version-link"><span>911 GT3</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    <!-- Taycan Versions -->
                                    <div class="car-versions-pane" data-car="taycan">
                                        <a href="{{ url('/dongxetaycan') }}" class="version-link"><span>Taycan</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxetaycan') }}" class="version-link"><span>Taycan 4S</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxetaycan') }}" class="version-link"><span>Taycan Turbo</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxetaycan') }}" class="version-link"><span>Taycan Cross Turismo</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    <!-- Panamera Versions -->
                                    <div class="car-versions-pane" data-car="panamera">
                                        <a href="{{ url('/dongxepana') }}" class="version-link"><span>Panamera</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxepana') }}" class="version-link"><span>Panamera 4</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxepana') }}" class="version-link"><span>Panamera Turbo S</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    <!-- Macan Versions -->
                                    <div class="car-versions-pane" data-car="macan">
                                        <a href="{{ url('/dongxemacan') }}" class="version-link"><span>Macan</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxemacan') }}" class="version-link"><span>Macan S</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxemacan') }}" class="version-link"><span>Macan GTS</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxemacan') }}" class="version-link"><span>Macan Turbo</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    <!-- Cayenne Versions -->
                                    <div class="car-versions-pane" data-car="cayenne">
                                        <a href="{{ url('/dongxecayne') }}" class="version-link"><span>Cayenne</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxecayne') }}" class="version-link"><span>Cayenne S</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxecayne') }}" class="version-link"><span>Cayenne GTS</span><i class="ri-arrow-right-s-line"></i></a>
                                        <a href="{{ url('/dongxecayne') }}" class="version-link"><span>Cayenne Turbo</span><i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                </div>

                                <!-- ===== CỘT 3: PREVIEW + THÔNG SỐ KỸ THUẬT ===== -->
                                <div class="car-preview-column">
                                    <!-- 718 Preview -->
                                    <div class="car-preview-pane active" data-car="718">
                                        <div class="preview-media-container">
                                         
                                            <img src="{{asset('frontend/asset/images/submenu-1.png')}}" alt="718" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 3.850.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 300 PS / 220 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">4,7 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxe718') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                    <!-- 911 Preview -->
                                    <div class="car-preview-pane" data-car="911">
                                        <div class="preview-media-container">
                                        
                                            <img src="{{asset('frontend/asset/images/submenu-2.png')}}" alt="911" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 7.500.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 385 PS / 283 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">4,2 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxe911') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                    <!-- Taycan Preview -->
                                    <div class="car-preview-pane" data-car="taycan">
                                        <div class="preview-media-container">
                                            <img src="{{asset('frontend/asset/images/submenu-3.png')}}" alt="Taycan" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 5.200.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 408 PS / 300 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">5,4 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxetaycan') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                    <!-- Panamera Preview -->
                                    <div class="car-preview-pane" data-car="panamera">
                                        <div class="preview-media-container">
                                           
                                            <img src="{{asset('frontend/asset/images/submenu-4.png')}}" alt="Panamera" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 6.000.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 330 PS / 243 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">5,3 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxepana') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                    <!-- Macan Preview -->
                                    <div class="car-preview-pane" data-car="macan">
                                        <div class="preview-media-container">
                                            
                                            <img src="{{asset('frontend/asset/images/submenu-5.png')}}" alt="Macan" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 3.200.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 265 PS / 195 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">6,5 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxemacan') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                    <!-- Cayenne Preview -->
                                    <div class="car-preview-pane" data-car="cayenne">
                                        <div class="preview-media-container">
                                        
                                            <img src="{{asset('frontend/asset/images/submenu-6.png')}}" alt="Cayenne" class="preview-car-img">
                                        </div>
                                        <div class="preview-specs-container">
                                            <div class="spec-grid">
                                                <div class="spec-item">
                                                    <span class="spec-value">Giá từ 5.400.000.000 VNĐ*</span>
                                                    <span class="spec-label">Giá tiêu chuẩn</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">Từ 340 PS / 250 kW</span>
                                                    <span class="spec-label">Công suất (PS)/Công suất (kW)</span>
                                                </div>
                                                <div class="spec-item">
                                                    <span class="spec-value">5,9 giây</span>
                                                    <span class="spec-label">Tăng tốc 0 – 100 km/giờ</span>
                                                </div>
                                            </div>
                                            <div class="spec-cta">
                                                <a href="{{ url('/dongxecayne') }}" class="preview-explore-btn">
                                                    <i class="ri-arrow-right-line"></i> Khám phá
                                                </a>
                                            </div>
                                        </div>
                                        <p class="preview-footnote">*Giá tiêu chuẩn bao gồm thuế nhập khẩu, thuế tiêu thụ đặc biệt và thuế giá trị gia tăng. Bằng giá, thông số kỹ thuật và hình ảnh có thể thay đổi theo từng thời điểm mà không báo trước.</p>
                                    </div>
                                </div>
                                <!-- end car-preview-column -->

                            </div><!-- end car-mega-menu-container -->
                        </div><!-- end car-models-mega-menu -->
                    </li>

                    <!-- Xe mới -->
                    <li class="nav-item">
                        <a href="{{ url('/xemoi') }}" class="nav-link">Xe mới</a>
                    </li>

                    <!-- Trung tâm Store -->
                    <li class="nav-item has-dropdown">
                        <a href="{{ url('/trungtam') }}" class="nav-link">Trung tâm Store</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/trungtamsg') }}" class="dropdown-link">Trung tâm Store Sài Gòn</a>
                            <a href="{{ url('/trungtamhn') }}" class="dropdown-link">Trung tâm Store Hà Nội</a>
                            <a href="{{ url('/trungtamstudio') }}" class="dropdown-link">Store Studio Hà Nội</a>
                        </div>
                    </li>

                    <!-- Dịch vụ -->
                    <li class="nav-item has-dropdown">
                        <a href="{{ url('/dichvu') }}" class="nav-link">Dịch vụ</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/dichvubh') }}" class="dropdown-link">Dịch vụ bán hàng</a>
                            <a href="{{ url('/dichvuhm') }}" class="dropdown-link">Dịch vụ hậu mãi</a>
                            <a href="{{ url('/dichvupk') }}" class="dropdown-link">Phụ kiện Tequipment</a>
                            <a href="{{ url('/dichvubst') }}" class="dropdown-link">Bộ sưu tập phong cách sống Store</a>
                            <a href="{{ url('/dichvuctkm') }}" class="dropdown-link">Chương trình ưu đãi</a>
                        </div>
                    </li>

                    <!-- Về Store -->
                    <li class="nav-item has-dropdown">
                        <a href="{{ url('/store') }}" class="nav-link">Về Store</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/storeag') }}" class="dropdown-link">Store AG</a>
                            <a href="{{ url('/storevn') }}" class="dropdown-link">Store Việt Nam</a>
                            <a href="{{ url('/tintuc') }}" class="dropdown-link">Tin tức và sự kiện</a>
                            <a href="{{ url('/thongtin') }}" class="dropdown-link">Thông tin báo chí</a>
                            <a href="{{ url('/cohoivl') }}" class="dropdown-link">Cơ hội việc làm</a>
                        </div>
                    </li>

                    <!-- Tiêu điểm -->
                    <li class="nav-item has-dropdown">
                        <a href="{{ url('/tieudiem') }}" class="nav-link">Tiêu điểm</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/tieudiem') }}" class="dropdown-link">Trải nghiệm có một không hai tại Store Hà Nội</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>