const eyePasswordIcon = document.querySelectorAll('.input-password-container img');
const inputPassword = document.querySelectorAll('.input-password-container input');

for(let i = 0; i < eyePasswordIcon.length; i++) {
  eyePasswordIcon[i].addEventListener('click', () => {
    if (inputPassword[i].getAttribute("type") == "password") {
      inputPassword[i].setAttribute("type", "text")
      eyePasswordIcon[i].setAttribute("src", "src/images/icon/eye.svg");
    } else {
      inputPassword[i].setAttribute("type", "password")
      eyePasswordIcon[i].setAttribute("src", "src/images/icon/eye-close.svg");
    }
  });
}