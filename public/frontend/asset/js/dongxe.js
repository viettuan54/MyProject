/*Su kien click cua dong xe */

function toggleFilter() {
    var content = document.getElementById("car-dx-text-seach");
    content.classList.toggle("open");
}

/*them so luong */
function increaseQuantity() {
    let qty = document.getElementById('quantity');
    qty.value = parseInt(qty.value) + 1;
}

function decreaseQuantity() {
    let qty = document.getElementById('quantity');
    if (qty.value > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
}
// cart 
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("success-popup");

    if (popup) {
        setTimeout(() => {
            popup.style.opacity = "0";
            popup.style.transform = "translateX(30px)";
            popup.style.transition = "all 0.5s ease";

            setTimeout(() => {
                popup.remove();
            }, 500);
        }, 3000);
    }
});
// tim xe bang search
// =======================
// SEARCH PRODUCT
// =======================

const searchInput = document.getElementById('searchInput');

function filterBySearch() {
    const keyword = searchInput.value.toLowerCase().trim();

    document.querySelectorAll('.car-dx-content').forEach(section => {
        let hasVisibleItem = false;

        section.querySelectorAll('.car-dx-content-item').forEach(item => {
            const name = item.dataset.name || '';

            if (name.includes(keyword)) {
                item.style.display = '';
                hasVisibleItem = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Ẩn section nếu không có xe phù hợp
        section.style.display = hasVisibleItem ? '' : 'none';
    });
}

searchInput.addEventListener('input', filterBySearch);

// tim xe bang filter(tich chon)
const filterButtons = document.querySelectorAll('.filter-btn');
let activeFilters = [];

filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;

        // toggle active
        btn.classList.toggle('active');

        if (activeFilters.includes(filter)) {
            activeFilters = activeFilters.filter(f => f !== filter);
        } else {
            activeFilters.push(filter);
        }

        filterProducts();
    });
});

function filterProducts() {
    const sections = document.querySelectorAll('.car-dx-content');

    sections.forEach(section => {
        const products = section.querySelectorAll('.car-dx-content-item');
        let visibleCount = 0;

        products.forEach(product => {
            const name = product.dataset.name;
            if (!name) return;

            if (activeFilters.length === 0) {
                product.style.display = 'block';
                visibleCount++;
                return;
            }

            const match = activeFilters.some(f =>
                name.includes(f)
            );

            product.style.display = match ? 'block' : 'none';
            if (match) visibleCount++;
        });

        // 👉 nếu section KHÔNG còn sản phẩm → ẨN LUÔN section
        section.style.display = visibleCount > 0 ? 'block' : 'none';
    });
}
// muc gia tieu chuan

// =======================
// PRICE RANGE FILTER
// =======================

const minRange = document.getElementById('priceMin');
const maxRange = document.getElementById('priceMax');
const minText = document.getElementById('price-min-text');
const maxText = document.getElementById('price-max-text');

// Format tiền VNĐ
function formatVND(number) {
    return number.toLocaleString('vi-VN') + ' vnđ';
}

// Hàm lọc
function filterProductsByPrice() {
    let minPrice = Number(minRange.value);
    let maxPrice = Number(maxRange.value);

    // Đảm bảo min <= max
    if (minPrice > maxPrice) {
        [minPrice, maxPrice] = [maxPrice, minPrice];
        minRange.value = minPrice;
        maxRange.value = maxPrice;
    }

    // Cập nhật text
    minText.textContent = formatVND(minPrice);
    maxText.textContent = formatVND(maxPrice);

    // Duyệt từng section
    document.querySelectorAll('.car-dx-content').forEach(section => {
        let hasVisibleItem = false;

        // Duyệt từng xe
        section.querySelectorAll('.car-dx-content-item').forEach(item => {
            const price = Number(item.dataset.price); // price_vnd

            if (!price) {
                item.style.display = 'none';
                return;
            }

            if (price >= minPrice && price <= maxPrice) {
                item.style.display = '';
                hasVisibleItem = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Ẩn section nếu không còn xe nào
        section.style.display = hasVisibleItem ? '' : 'none';
    });
}

// Lắng nghe slider
minRange.addEventListener('input', filterProductsByPrice);
maxRange.addEventListener('input', filterProductsByPrice);

// Khởi chạy lần đầu
filterProductsByPrice();
