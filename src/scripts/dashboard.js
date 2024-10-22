const hamburgerMenu = document.querySelector('.hamburger-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const darkBackground = document.querySelector('.dark-bg');
const userIcon = document.querySelector('nav img');
const userDropDown = document.querySelector('.user-dropdown');

hamburgerMenu.addEventListener('click', () => {
  hamburgerMenu.classList.toggle('active');
  offScreenMenu.classList.toggle('active');
  darkBackground.classList.toggle('active');
});

userIcon.addEventListener('click', () => {
  userDropDown.classList.toggle('active');
});