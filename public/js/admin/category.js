// thẻ input file chọn ảnh
const changeImg = document.getElementById("avatar");
// img hiển thị hình
const preview = document.getElementById("imagePreview");
changeImg.addEventListener("change", function (event) {
    // Lấy tập tin hình ảnh đã chọn từ sự kiện
    const file = event.target.files[0];
    // Tạo đối tượng FileReader để đọc tập tin
    const reader = new FileReader();
    // Xử lý khi đọc file hoàn tất
    reader.onload = function (e) {
        // Lấy đường dẫn URL của hình ảnh đã chọn
        const imageUrl = e.target.result;
        // Hiển thị hình ảnh đã chọn trên trang web
        preview.src = imageUrl;
        preview.style.display = "block"; // Hiển thị hình ảnh
    };
    // Đọc tập tin hình ảnh như là URL (base64)
    reader.readAsDataURL(file);
});
