const luachonsua = document.querySelectorAll("#chinh_sua");
luachonsua.forEach((row) => {
    let dem = 0;
    row.addEventListener("dblclick", function () {
        const formSua = row.querySelector("#formluachon");
        if (dem == 0) {
            formSua.style.display = "flex";
            dem = 1;
        } else {
            formSua.style.display = "none";
            dem = 0;
        }
    });
});
// sự kiện tìm kiếm theo lựa chọn quyền
const searchRole = document.getElementById("filterByRole");
const formSearchRole = document.getElementById("filterForm");
const hiddenInput = document.getElementById("selectedRole");
searchRole.addEventListener("change", function () {
    let kq = this.value;
    if (kq === "all") {
        hiddenInput.value = "";
    } else {
        hiddenInput.value = kq;
    }
    formSearchRole.submit();
});
// sự kiện tìm kiếm theo lựa khoản giá
const searchMoney = document.getElementById("filterByMoney");
const formSearchMoney = document.getElementById("filterFormMoney");
const spaceMoneyInput = document.getElementById("selectedSpaceMoney");

searchMoney.addEventListener("change", function () {
    let kq = this.value;
    if (kq === "all") {
        spaceMoneyInput.value = "";
    } else {
        spaceMoneyInput.value = kq;
    }
    // alert(kq);
    formSearchMoney.submit();
});
