  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/trangchu.css')}}?v=20260421">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/xemoi.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/trungtam.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/dichvu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/vestore.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/dongxe.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/footer.css')}}">
    <!-- Luxury Premium Header CSS -->
    <link rel="stylesheet" href="{{asset('frontend/asset/css/luxury-header.css')}}?v=20260422-3">
    
    <!-- Inline CSS Override for Dropdown Fix -->
    <style>
        /* Force dropdown to show on hover - CRITICAL FIX */
        .luxury-header .nav-item.has-dropdown {
            position: relative !important;
        }
        
        .luxury-header .nav-item.has-dropdown .dropdown-menu {
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            display: block !important;
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateY(-10px) !important;
            transition: all 0.3s ease !important;
            z-index: 9999 !important;
        }
        
        .luxury-header .nav-item.has-dropdown:hover .dropdown-menu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }
        
        /* Force mega-menu to show on hover */
        .luxury-header .nav-item.has-mega-menu {
            position: relative !important;
        }
        
        .luxury-header .nav-item.has-mega-menu .mega-menu {
            position: absolute !important;
            top: 100% !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            display: block !important;
            opacity: 0 !important;
            visibility: hidden !important;
            transition: all 0.4s ease !important;
            z-index: 9999 !important;
        }
        
        .luxury-header .nav-item.has-mega-menu:hover .mega-menu {
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        /* Hide old submenu classes */
        .submenu-tt-item,
        .submenu-dv-item,
        .submenu-st-item,
        .submenu-td-item {
            display: none !important;
        }
        
        /* Dropdown with Images - Các dòng xe */
        .luxury-header .dropdown-with-images {
            min-width: 320px !important;
        }
        
        .luxury-header .dropdown-link-image {
            display: flex !important;
            align-items: center !important;
            gap: 16px !important;
            padding: 12px 20px !important;
        }
        
        .luxury-header .dropdown-link-image img {
            width: 70px !important;
            height: 45px !important;
            object-fit: cover !important;
            border-radius: 6px !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            transition: transform 0.3s ease !important;
        }
        
        .luxury-header .dropdown-link-image:hover img {
            transform: scale(1.1) !important;
        }
        
        .luxury-header .dropdown-link-image span {
            font-size: 15px !important;
            font-weight: 600 !important;
            color: var(--porsche-dark) !important;
        }
        
        .luxury-header .dropdown-link-image:hover span {
            color: var(--porsche-red) !important;
        }
        
        /* ===================================================
           DROPDOWN CAR MENU - Compact Version
           Text trái - Image giữa - Arrow phải
           ================================================= */
        .luxury-header .dropdown-car-menu {
            min-width: 280px !important;
            max-width: 300px !important;
            border-radius: 10px !important;
            overflow: hidden !important;
        }
        
        .luxury-header .dropdown-car-item {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 10px 14px !important;
            gap: 8px !important;
            position: relative !important;
            transition: all 0.3s ease !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
        }
        
        .luxury-header .dropdown-car-item:last-child {
            border-bottom: none !important;
        }
        
        /* Hover effect - Gradient đỏ như mẫu */
        .luxury-header .dropdown-car-item:hover {
            background: linear-gradient(90deg, #ff4757 0%, #ff6b81 100%) !important;
            padding-left: 18px !important;
        }
        
        /* Car Name - Bên trái */
        .luxury-header .car-name {
            font-size: 14px !important;
            font-weight: 700 !important;
            color: var(--porsche-dark) !important;
            min-width: 60px !important;
            transition: color 0.3s ease !important;
        }
        
        .luxury-header .dropdown-car-item:hover .car-name {
            color: #ffffff !important;
        }
        
        /* Car Image - Ở giữa */
        .luxury-header .car-image {
            width: 95px !important;
            height: auto !important;
            object-fit: contain !important;
            transition: transform 0.3s ease !important;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1)) !important;
        }
        
        .luxury-header .dropdown-car-item:hover .car-image {
            transform: translateX(-6px) scale(1.05) !important;
            filter: drop-shadow(0 3px 8px rgba(255, 255, 255, 0.3)) !important;
        }
        
        /* Arrow - Bên phải */
        .luxury-header .car-arrow {
            font-size: 18px !important;
            color: var(--porsche-gray) !important;
            transition: all 0.3s ease !important;
            flex-shrink: 0 !important;
        }
        
        .luxury-header .dropdown-car-item:hover .car-arrow {
            color: #ffffff !important;
            transform: translateX(3px) !important;
        }
    </style>
<title>
    @hasSection('title')
        @yield('title') | {{ config('app.name') }}
    @else
        {{ config('app.name') }}
    @endif
</title>
  