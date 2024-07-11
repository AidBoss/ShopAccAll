document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".slide");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    let currentIndex = 0;
    const slideWidth = slides[0].clientWidth;

    // Thiết lập sự kiện cho nút Prev
    prevBtn.addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlider();
    });

    // Thiết lập sự kiện cho nút Next
    nextBtn.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    });
    
    // Hàm tự động chuyển đến slide tiếp theo sau 2 giây
    function autoNextSlide() {
        setTimeout(function () {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
            autoNextSlide(); // Gọi lại hàm để tự động chuyển đổi liên tục
        }, 2000); // 2000 milliseconds = 2 giây
    }

    // Bắt đầu chạy hàm tự động sau khi tải xong trang
    autoNextSlide();
    // Cập nhật slider khi thay đổi chỉ số hiện tại
    function updateSlider() {
        const offset = -currentIndex * slideWidth;
        slider.style.transform = `translateX(${offset}px)`;
    }
});
