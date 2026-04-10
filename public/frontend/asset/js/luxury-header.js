// ================================================
// LUXURY HEADER JAVASCRIPT
// Xử lý sticky header, search overlay, và animations
// ================================================

document.addEventListener('DOMContentLoaded', function () {

    // ================================================
    // STICKY HEADER
    // ================================================
    const header = document.querySelector('.luxury-header');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 100) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }

        lastScroll = currentScroll;
    });

    // ================================================
    // SEARCH OVERLAY
    // ================================================
    const searchToggle = document.querySelector('.search-toggle');
    const searchOverlay = document.querySelector('.search-overlay');
    const searchClose = document.querySelector('.search-close');
    const searchInput = document.querySelector('.search-container input');
    const searchResults = document.querySelector('#searchResults');
    const searchWrapper = document.querySelector('.header-search-top');
    let searchTimeout;

    function lockBodyForMobile() {
        if (window.innerWidth <= 768) {
            document.body.style.overflow = 'hidden';
        }
    }

    function unlockBodyForMobile() {
        document.body.style.overflow = '';
    }

    function openSearch() {
        searchOverlay.classList.add('active');
        searchToggle.classList.add('active');
        lockBodyForMobile();
        setTimeout(() => {
            searchInput.focus();
        }, 120);
    }

    function closeSearch(clearInput = false) {
        searchOverlay.classList.remove('active');
        searchToggle.classList.remove('active');
        unlockBodyForMobile();

        if (clearInput) {
            searchInput.value = '';
            showDefaultSuggestions();
        }
    }

    if (searchToggle && searchOverlay) {
        // Open search
        searchToggle.addEventListener('click', () => {
            if (searchOverlay.classList.contains('active')) {
                closeSearch();
            } else {
                openSearch();
            }
        });

        // Close search
        searchClose.addEventListener('click', () => {
            closeSearch(true);
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
                closeSearch();
            }
        });

        // Close when click outside search area
        document.addEventListener('click', (e) => {
            if (
                searchOverlay.classList.contains('active') &&
                searchWrapper &&
                !searchWrapper.contains(e.target)
            ) {
                closeSearch();
            }
        });

        // Prevent outside-click close when clicking inside search panel
        searchOverlay.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Real-time search
        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            const query = e.target.value.trim();

            if (query.length < 2) {
                showDefaultSuggestions();
                return;
            }

            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        // Search on Enter key
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query.length >= 2) {
                    performSearch(query);
                } else {
                    showDefaultSuggestions();
                }
            }
        });
    }

    // Function to perform search
    async function performSearch(query) {
        const container = searchResults;
        container.innerHTML = '<div class="search-loading"><div class="search-spinner"></div></div>';

        try {
            const response = await fetch(`/api/search?q=${encodeURIComponent(query)}`);
            const data = await response.json();

            if (data.results && data.results.length > 0) {
                displaySearchResults(data.results);
            } else {
                container.innerHTML = `
                    <div class="search-empty-state">
                        <i class="ri-search-2-line"></i>
                        <p>Không tìm thấy sản phẩm nào phù hợp với "<strong>${escape(query)}</strong>"</p>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Search error:', error);
            container.innerHTML = `
                <div class="search-empty-state">
                    <i class="ri-error-warning-line"></i>
                    <p>Có lỗi xảy ra. Vui lòng thử lại.</p>
                </div>
            `;
        }
    }

    // Function to display search results
    function displaySearchResults(results) {
        const container = searchResults;
        const html = `
            <div class="search-product-list">
                ${results.map(product => `
                    <a href="${product.url}" class="search-product-item">
                        <div class="search-product-image">
                            <img src="${product.image}" alt="${product.name}" onerror="this.src='/frontend/asset/images/default.png'">
                        </div>
                        <div class="search-product-info">
                            <div class="search-product-name">${product.name}</div>
                            <div class="search-product-category">${product.category}</div>
                            <div class="search-product-price">${product.price}</div>
                        </div>
                    </a>
                `).join('')}
            </div>
        `;
        container.innerHTML = html;
    }

    // Function to show default suggestions
    function showDefaultSuggestions() {
        const container = searchResults;
        container.innerHTML = `
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
        `;
    }

    // Global search function for suggestion items
    window.search = function (query) {
        searchInput.value = query;
        performSearch(query);
    };

    // ================================================
    // MEGA MENU HOVER EFFECTS
    // ================================================
    const megaMenuItems = document.querySelectorAll('.mega-item');

    megaMenuItems.forEach(item => {
        item.addEventListener('mouseenter', function () {
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
    });

    // ================================================
    // DROPDOWN MENU AUTO-POSITION
    // ================================================
    const dropdowns = document.querySelectorAll('.has-dropdown');

    dropdowns.forEach(dropdown => {
        const menu = dropdown.querySelector('.dropdown-menu');
        if (menu) {
            dropdown.addEventListener('mouseenter', () => {
                const rect = menu.getBoundingClientRect();
                const viewportWidth = window.innerWidth;

                // If menu goes off-screen to the right
                if (rect.right > viewportWidth) {
                    menu.style.left = 'auto';
                    menu.style.right = '0';
                }
            });
        }
    });

    // ================================================
    // CART BADGE UPDATE (if needed)
    // ================================================
    function updateCartBadge() {
        const cartBadge = document.querySelector('.cart-badge');
        // Add your cart count logic here
        // Example: fetch cart items from localStorage or API
        // cartBadge.textContent = cartCount;
    }

    // Call on page load
    updateCartBadge();

    // ================================================
    // SMOOTH SCROLL FOR INTERNAL LINKS
    // ================================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerHeight = header.offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ================================================
    // MOBILE MENU CLOSE ON LINK CLICK
    // ================================================
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Close any open mega menus or dropdowns on mobile
            if (window.innerWidth <= 768) {
                const openMenus = document.querySelectorAll('.mega-menu, .dropdown-menu');
                openMenus.forEach(menu => {
                    menu.style.display = 'none';
                    setTimeout(() => {
                        menu.style.display = '';
                    }, 300);
                });
            }
        });
    });

    // ================================================
    // USER DROPDOWN CLICK BEHAVIOR ON MOBILE
    // ================================================
    if (window.innerWidth <= 768) {
        const userMenu = document.querySelector('.header-user-menu');
        const userDropdown = document.querySelector('.user-dropdown-menu');

        if (userMenu && userDropdown) {
            userMenu.addEventListener('click', (e) => {
                e.stopPropagation();
                userDropdown.style.display =
                    userDropdown.style.display === 'block' ? 'none' : 'block';
                userDropdown.style.opacity =
                    userDropdown.style.opacity === '1' ? '0' : '1';
                userDropdown.style.visibility =
                    userDropdown.style.visibility === 'visible' ? 'hidden' : 'visible';
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', () => {
                userDropdown.style.display = 'none';
                userDropdown.style.opacity = '0';
                userDropdown.style.visibility = 'hidden';
            });
        }
    }

    // ================================================
    // LOADING ANIMATION
    // ================================================
    window.addEventListener('load', () => {
        header.style.opacity = '0';
        header.style.transform = 'translateY(-20px)';

        setTimeout(() => {
            header.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            header.style.opacity = '1';
            header.style.transform = 'translateY(0)';
        }, 100);
    });

    // ================================================
    // PREVENT MEGA MENU CLOSE ON CLICK INSIDE
    // ================================================
    const megaMenus = document.querySelectorAll('.mega-menu');

    megaMenus.forEach(menu => {
        menu.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    });

    console.log('✅ Luxury Header initialized');

    // Debug: Log dropdown elements
    const dropdownItems = document.querySelectorAll('.has-dropdown');
    console.log('Found dropdown items:', dropdownItems.length);
    dropdownItems.forEach((item, index) => {
        const menu = item.querySelector('.dropdown-menu');
        console.log(`Dropdown ${index}:`, {
            hasMenu: !!menu,
            menuDisplay: menu ? window.getComputedStyle(menu).display : 'N/A',
            menuOpacity: menu ? window.getComputedStyle(menu).opacity : 'N/A'
        });
    });
});
