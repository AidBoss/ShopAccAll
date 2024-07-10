document.addEventListener("DOMContentLoaded", function () {
    const btnCreate = document.getElementById("btn_create");
    btnCreate.addEventListener("click", function (event) {
        event.preventDefault;
        Swal.fire({
            title: "Thành công!",
            text: "Bạn đã gửi thành công!",
            icon: "success",
        });
        setTimeout(() => {
            btnCreate.closest("form").submit(); // Gửi form sau khi xác nhận
        }, 2000);
    });
});
