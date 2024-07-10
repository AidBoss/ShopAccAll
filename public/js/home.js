const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// Slider
// biến lưu danh sách hình ảnh
const imgs = $$(".header_slider ul img");
// biến nút lùi
const btnPrev = $(".control_prev");
// biến nút next
const btnNext = $(".control_next");

// biến đếm
let n = 0;
// set thời gian tự động ấn nút next
let auto = setInterval(() => {
    btnNext.click();
}, 8000);

function changeSlider() {
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].style.overflow = "hidden";
    }
    imgs[n].style.overflow = "visible";

    // Xóa thời gian auto
    clearInterval(auto);
    // chạy lại time auto
    auto = setInterval(() => {
        btnNext.click();
    }, 8000);
}
changeSlider();
// sự kiện khi nhấn nút lùi
btnPrev.addEventListener("click", (evt) => {
    // Ngăn hành vi mặc định của thẻ <a></a>
    evt.preventDefault();
    if (n > 0) {
        n--;
    } else {
        n = imgs.length - 1;
    }
    changeSlider();
});

btnNext.addEventListener("click", (evt) => {
    // Ngăn hành vi mặc định của thẻ <a></a>
    evt.preventDefault();
    if (n < imgs.length - 1) {
        n++;
    } else {
        n = 0;
    }
    changeSlider();
});
const hienTT = document.getElementsByClassName("item_avata_login")[0];
const anTT = document.getElementsByClassName("hidden_infor_user")[0];
let dem = 0;
hienTT.addEventListener("click", (evt) => {
    if (dem === 0) {
        anTT.style.display = "none";
        console.log(dem);
        dem = 1;
    } else {
        anTT.style.display = "flex";
        console.log(dem);
        dem = 0;
    }
});
