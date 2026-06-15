const slides = document.querySelectorAll('.slider-item');
const arrowRight = document.querySelector('.ri-arrow-right-wide-line');
const arrowLeft = document.querySelector('.ri-arrow-left-wide-line');
const dotsContainer = document.querySelector('.slider-dots');

let current = 0;
let timer = null;
const total = slides.length;

/* Setup vị trí ban đầu */
slides.forEach((slide, i) => {
    slide.style.left = i === 0 ? '0%' : '100%';
    if (i === 0) slide.classList.add('active'); // Thêm class active cho slide đầu tiên
    const v = slide.querySelector('video');
    if (v) v.preload = "auto";
});

/* Tạo dots */
slides.forEach((_, i) => {
    const dot = document.createElement('div');
    dot.className = 'dot' + (i === 0 ? ' active' : '');
    dot.onclick = () => {
        const direction = i > current ? 'next' : 'prev';
        goToSlide(i, direction);
    };
    dotsContainer.appendChild(dot);
});
const dots = document.querySelectorAll('.dot');

function updateDots() {
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

function clearTimer() {
    if (timer) {
        clearTimeout(timer);
        timer = null;
    }
}

/* Tối ưu hàm dừng Video: Reset hẳn về 0 để tránh lưu khung hình cũ */
function stopAllVideos() {
    slides.forEach(slide => {
        const v = slide.querySelector('video');
        if (v) {
            v.pause();
            v.currentTime = 0; // Đưa video về giây đầu tiên ngay lập tức
            v.onended = null;
            v.ontimeupdate = null;
        }
    });
}

/* Auto control theo loại slide */
function schedule() {
    clearTimer();
    stopAllVideos();

    const indexLock = current;
    const slide = slides[indexLock];
    const video = slide.querySelector('video');

    if (video) {
        video.currentTime = 0;
        
        setTimeout(() => {
            if (current !== indexLock) return;

            video.play()
                .then(() => {
                    // Theo dõi tiến trình thời gian thực
                    video.ontimeupdate = () => {
                        if (video.duration && (video.currentTime >= video.duration - 0.3)) {
                            video.ontimeupdate = null;
                            if (current === indexLock) {
                                goToSlide((current + 1) % total, 'next');
                            }
                        }
                    };

                    video.onended = () => {
                        if (current === indexLock) {
                            goToSlide((current + 1) % total, 'next');
                        }
                    };
                })
                .catch((err) => {
                    // Cơ chế bảo hiểm tự nhảy nếu bị chặn phát tự động
                    timer = setTimeout(() => {
                        if (current === indexLock) goToSlide((current + 1) % total, 'next');
                    }, 10000);
                });
        }, 100);

    } else {
        timer = setTimeout(() => {
            if (current === indexLock) {
                goToSlide((current + 1) % total, 'next');
            }
        }, 13000);
    }
}

/* Di chuyển slide */
function goToSlide(next, direction = 'next') {
    if (next === current) return;

    clearTimer();
    
    // Loại bỏ class active của slide cũ trước khi đổi vị trí
    slides.forEach(slide => slide.classList.remove('active'));

    // Đặt vị trí xuất phát cho slide mới và thêm class active
    slides[next].style.left = direction === 'next' ? '100%' : '-100%';
    slides[next].classList.add('active');
    slides[next].offsetHeight; // Force reflow

    requestAnimationFrame(() => {
        slides[current].style.left = direction === 'next' ? '-100%' : '100%';
        slides[next].style.left = '0%';
    });

    current = next;
    updateDots();
    schedule();
}

/* Arrow */
arrowRight.onclick = () => goToSlide((current + 1) % total, 'next');
arrowLeft.onclick  = () => goToSlide((current - 1 + total) % total, 'prev');

/* Khởi động */
schedule();