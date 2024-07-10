document.addEventListener("DOMContentLoaded", function () {
    const btnUpdate = document.getElementById("btn_update");
    btnUpdate.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định
        Swal.fire({
            title: "Bạn có muốn lưu thay đổi không?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Lưu",
            denyButtonText: `Không lưu`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Đã lưu!", "", "success");
                setTimeout(() => {
                    btnUpdate.closest("form").submit(); // Gửi form sau khi xác nhận
                }, 2000);
            } else if (result.isDenied) {
                Swal.fire("Những thay đổi không được lưu!", "", "info");
            }
        });
    });
});
