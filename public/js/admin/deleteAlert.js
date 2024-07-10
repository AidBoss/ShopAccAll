const btns_xoa = document.querySelectorAll(".btn_delete_category");
btns_xoa.forEach(function (btn_xoa) {
    btn_xoa.addEventListener("click", function (event) {
        // Ngăn chặn hành động mặc định của liên kết
        event.preventDefault();
        //Biến này lưu trữ đường dẫn URL đến route trong Laravel của bạn để xóa một danh mục cụ thể.
        const deleteUrl = btn_xoa.getAttribute("href");
        Swal.fire({
            title: "Bạn có chắc chắn không?",
            text: "Bạn sẽ không thể khôi phục lại điều này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý xóa!",
        }).then((result) => {
            if (result.isConfirmed) {
                // chuyển hướng sau khi người dùng xác nhận hành động xóa thông qua SweetAlert2.
                //được sử dụng để chuyển hướng trình duyệt của người dùng đến một URL cụ thể khi được kích hoạt
                setTimeout(() => {
                    window.location.href = deleteUrl;
                }, 2000); // 3 giây sau mới chạy
                Swal.fire({
                    title: "Đã xóa!",
                    text: "Bạn đã được xóa thành công.",
                    icon: "success",
                });
            }
        });
    });
});
