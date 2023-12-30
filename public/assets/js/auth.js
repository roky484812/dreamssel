const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");


const passwordInput = document.querySelectorAll('.inputPass');
const showPasswordBtn = document.querySelectorAll('.eyeBtn');
const openEyeIcon = document.querySelectorAll('.openEye');
const closeEyeIcon = document.querySelectorAll('.closeEye');

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});



showPasswordBtn[0].addEventListener('click', () => {
  if (passwordInput[0].type === 'password') {
    passwordInput[0].type = 'text';
    openEyeIcon[0].style.display = 'none';
    closeEyeIcon[0].style.display = 'block';
  } else {
    passwordInput[0].type = 'password';
    openEyeIcon[0].style.display = 'block';
    closeEyeIcon[0].style.display = 'none';
  }
});


showPasswordBtn[1].addEventListener('click', () => {
  if (passwordInput[1].type === 'password') {
    passwordInput[1].type = 'text';
    openEyeIcon[1].style.display = 'none';
    closeEyeIcon[1].style.display = 'block';
  } else {
    passwordInput[1].type = 'password';
    openEyeIcon[1].style.display = 'block';
    closeEyeIcon[1].style.display = 'none';
  }
});