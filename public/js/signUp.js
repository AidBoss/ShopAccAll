document.addEventListener("DOMContentLoaded", function () {
    var inputs = document.querySelectorAll(".input_box_forget input");

    inputs.forEach(function (input) {
        input.addEventListener("input", function () {
            if (input.value !== "") {
                input.classList.add("has-value");
            } else {
                input.classList.remove("has-value");
            }
        });

        // Ensure the label is correctly placed on page load if there's a value
        if (input.value !== "") {
            input.classList.add("has-value");
        }
    });
});

// const check_st = document.getElementById("check_security");
// const text_st = document.getElementById("text_security");
// const content_st = document.getElementById("content_security");
// let check = false;
// check_st.onclick = function () {
//   if (check) {
//     text_st.style.display = "block";
//     content_st.style.display = "none";
//     check_st.className = "fa-solid fa-caret-down";
//     check_st.style.margin = "4px";
//     check = false;
//   } else {
//     text_st.style.display = "none";
//     content_st.style.display = "block";
//     check_st.className = "fa-solid fa-caret-up";
//     check_st.style.margin = "15px 5px";
//     check = true;
//   }
// };

// chuyển form
// const btn_Register = document.getElementById("change_form_SignUp");
// const btn_Login = document.getElementById("change_form_login");
// const btn_forgetPass = document.getElementById("text_security");
// const btn_goback_login = document.getElementById("goback_login");
// const form_Login = document.getElementById("form_login");
// const form_Register = document.getElementById("form_register");
// const form_forget = document.getElementById("form_forgetPass");

// console.log(change_form_login);
// let index = 0;
// function backLogin() {
//     if (index == 1) {
//         form_Login.style.display = "block";
//         form_Register.style.display = "none";
//         form_forget.style.display = "none";
//         index = 0;
//     } else {
//         form_Login.style.display = "block";
//         form_Register.style.display = "none";
//         form_forget.style.display = "none";
//         index = 1;
//     }
// }
// function backRegister() {
//     if (index == 0) {
//         form_Login.style.display = "none";
//         form_Register.style.display = "block";
//         form_forget.style.display = "none";
//         index = 1;
//     } else {
//         form_Login.style.display = "block";
//         form_Register.style.display = "none";
//         form_forget.style.display = "none";
//         index = 0;
//     }
// }
// function toForget() {
//     if (index == 0) {
//         form_Login.style.display = "none";
//         form_Register.style.display = "none";
//         form_forget.style.display = "block";
//         index = 1;
//     } else {
//         form_Login.style.display = "none";
//         form_Register.style.display = "none";
//         form_forget.style.display = "block";
//         index = 0;
//     }
// }
// btn_Register.onclick = function () {
//     backRegister();
// };

// btn_Login.onclick = function () {
//     backLogin();
// };
// btn_forgetPass.onclick = function () {
//     toForget();
// };
// btn_goback_login.onclick = function () {
//     backLogin();
// };
