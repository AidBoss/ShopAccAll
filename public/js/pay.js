document.addEventListener("DOMContentLoaded", function () {
    const btn_momo = document.getElementById("method_momo");
    const btn_bank = document.getElementById("method_bank");
    const btn_tc = document.getElementById("method_tc");
    const btn_history = document.getElementById("method_history");

    const form_momo = document.getElementById("momo_pay");
    const form_bank = document.getElementById("bank_pay");
    const form_tc = document.getElementById("tc_pay");
    const form_history = document.getElementById("history_pay");
    console.log(form_momo, form_bank);
    console.log(btn_momo, btn_bank);
    btn_momo.onclick = function () {
        form_momo.style.display = "flex";
        form_bank.style.display = "none";
        form_tc.style.display = "none";
        form_history.style.display = "none";
    };
    btn_bank.onclick = function () {
        form_momo.style.display = "none";
        form_bank.style.display = "flex";
        form_tc.style.display = "none";
        form_history.style.display = "none";
    };
});

// btn_history.onclick = function () {
//     form_momo.style.display = "none";
//     form_bank.style.display = "none";
//     form_tc.style.display = "none";
//     form_history.style.display = "block";
// };

// const selectSpace = document.getElementById("selectSpace");
// const stn = document.getElementById("stn");
// stn.addEventListener("change", function (e) {
//     selectSpace.value = stn.value;
//     console.log(selectSpace.value);
// });

// const selectS = document.getElementById("selectSpace");
// const inPriceMomo = document.getElementById("amountMomo");
// selectS.addEventListener("change", function (e) {
//     selectS.value = inPriceMomo.value;
//     console.log(inPriceMomo.value);
// });
document.addEventListener("DOMContentLoaded", function () {
    const selectElements = document.querySelectorAll(".stn");
    const hiddenInputs = document.querySelectorAll(".selectSpace");
    selectElements.forEach((selectElement, index) => {
        selectElement.addEventListener("change", function () {
            hiddenInputs[index].value = selectElement.value;
            console.log(hiddenInputs[index].value);
        });
    });
});
