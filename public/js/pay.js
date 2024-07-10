const btn_momo = document.getElementById("method_momo");
const btn_bank = document.getElementById("method_bank");
const btn_tc = document.getElementById("method_tc");
const btn_history = document.getElementById("method_history");

const form_momo = document.getElementById("momo_pay");
const form_bank = document.getElementById("bank_pay");
const form_tc = document.getElementById("tc_pay");
const form_history = document.getElementById("history_pay");

let index = 0;
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

btn_tc.onclick = function () {
  form_momo.style.display = "none";
  form_bank.style.display = "none";
  form_tc.style.display = "flex";
  form_history.style.display = "none";
};
btn_history.onclick = function () {
  form_momo.style.display = "none";
  form_bank.style.display = "none";
  form_tc.style.display = "none";
  form_history.style.display = "block";
};
