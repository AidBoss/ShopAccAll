let formSubmit = document.getElementById("filterForm");
const hiddenInput = document.getElementById("selectedCate");
document.addEventListener("DOMContentLoaded", function () {
    let categoryLinks = document.querySelectorAll(".manager_char_left a");
    categoryLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            var category = this.getAttribute("data-category");
            let kq = category;
            if (kq === "all") {
                hiddenInput.value = "";
            } else {
                hiddenInput.value = kq;
            }
            formSubmit.submit();
        });
    });
});
