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
                
                @php
                    $cartCount = collect(session('cart', []))->sum('quantity');
                @endphp

                <!-- Cart -->
                <a href="{{ url('/cart') }}" class="topbar-icon cart-icon">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span class="cart-badge">{{ $cartCount }}</span>
                </a>
                
                <!-- User -->
                <div class="header-user-menu">
                    @auth
                        @if(Auth::user()->avatar)
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
                    <li class="nav-item has-dropdown has-images">
                        <a href="{{ url('/dongxe') }}" class="nav-link">Các dòng xe</a>
                        <div class="dropdown-menu dropdown-with-images car-models-dropdown">
                            <a href="{{ url('/dongxe718') }}" class="dropdown-link car-model-item">
                                <span class="car-name">718</span>
                                <img src="{{asset('frontend/asset/images/submenu-1.png')}}" alt="718" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                            <a href="{{ url('/dongxe911') }}" class="dropdown-link car-model-item">
                                <span class="car-name">911</span>
                                <img src="{{asset('frontend/asset/images/submenu-2.png')}}" alt="911" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                            <a href="{{ url('/dongxetaycan') }}" class="dropdown-link car-model-item">
                                <span class="car-name">Taycan</span>
                                <img src="{{asset('frontend/asset/images/submenu-3.png')}}" alt="Taycan" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                            <a href="{{ url('/dongxepana') }}" class="dropdown-link car-model-item">
                                <span class="car-name">Panamera</span>
                                <img src="{{asset('frontend/asset/images/submenu-4.png')}}" alt="Panamera" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                            <a href="{{ url('/dongxemacan') }}" class="dropdown-link car-model-item">
                                <span class="car-name">Macan</span>
                                <img src="{{asset('frontend/asset/images/submenu-5.png')}}" alt="Macan" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                            <a href="{{ url('/dongxecayne') }}" class="dropdown-link car-model-item">
                                <span class="car-name">Cayenne</span>
                                <img src="{{asset('frontend/asset/images/submenu-6.png')}}" alt="Cayenne" class="car-image">
                                <i class="ri-arrow-right-s-line car-arrow"></i>
                            </a>
                        </div>
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