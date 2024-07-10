const btnHonKai = document.getElementById("Species_one");
const btnGenshin = document.getElementById("Species_two");
const btnHonKai3 = document.getElementById("Species_three");
const btnLq = document.getElementById("Species_four");

const title_ql = document.getElementById("title_ql");
let text = "";
btnHonKai.addEventListener("click", function () {
  text = btnHonKai.innerHTML;
  title_ql.innerText = text;
});

btnGenshin.addEventListener("click", function () {
  text = btnGenshin.innerHTML;
  title_ql.innerText = text;
});

btnHonKai3.addEventListener("click", function () {
  text = btnHonKai3.innerHTML;
  title_ql.innerText = text;
});

btnLq.addEventListener("click", function () {
  text = btnLq.innerHTML;
  title_ql.innerText = text;
});
