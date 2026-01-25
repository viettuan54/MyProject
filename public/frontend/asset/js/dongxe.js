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

// const minRange = document.getElementById('priceMin');
// const maxRange = document.getElementById('priceMax');
// const minText = document.getElementById('price-min-text');
// const maxText = document.getElementById('price-max-text');

// function formatVND(number) {
//     return number.toLocaleString('vi-VN') + ' vnđ';
// }

// function filterProductsByPrice() {
//     let minPrice = parseInt(minRange.value);
//     let maxPrice = parseInt(maxRange.value);

//     if (minPrice > maxPrice) {
//         [minRange.value, maxRange.value] = [maxPrice, minPrice];
//         minPrice = minRange.value;
//         maxPrice = maxRange.value;
//     }

//     minText.textContent = formatVND(minPrice);
//     maxText.textContent = formatVND(maxPrice);

//     document.querySelectorAll('.car-dx-content-item').forEach(item => {
//         const price = parseInt(item.dataset.price);

//         if (price >= minPrice && price <= maxPrice) {
//             item.style.display = 'block';
//         } else {
//             item.style.display = 'none';
//         }
//     });
// }

// minRange.addEventListener('input', filterProductsByPrice);
// maxRange.addEventListener('input', filterProductsByPrice);

// filterProductsByPrice();

