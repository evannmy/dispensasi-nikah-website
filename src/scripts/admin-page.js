const hamburgerMenu = document.querySelector('.hamburger-menu');
const hamburgerCloseMenu = document.querySelector('.hamburger-menu-close');
const offScreenMenu = document.querySelector('.off-screen-menu');
const darkBackground = document.querySelector('.dark-bg');
const userIcon = document.querySelectorAll('nav img')[1];
const userDropDown = document.querySelector('.user-dropdown');
const bookIcon = document.querySelectorAll('.off-screen-menu ul li a img')[0];
const addDataIcon = document.querySelectorAll('.off-screen-menu ul li a img')[1];

hamburgerMenu.addEventListener('click', () => {
  offScreenMenu.classList.add('active');
  darkBackground.classList.add('active');
});

hamburgerCloseMenu.addEventListener('click', () => {
  offScreenMenu.classList.remove('active');
  darkBackground.classList.remove('active');
});

window.addEventListener('click',function(event){
  if (event.target != hamburgerMenu && event.target.parentNode != hamburgerMenu && event.target != offScreenMenu && event.target.parentNode != offScreenMenu){
    if (offScreenMenu.classList.contains('active')) {
      offScreenMenu.classList.remove('active');
      darkBackground.classList.remove('active');
    }
  }
  
  if (event.target != userIcon && event.target.parentNode != userIcon && event.target != userDropDown && event.target.parentNode != userDropDown) {
    if (userDropDown.classList.contains('active')) {
      userDropDown.classList.remove('active');
    }
  }
}); 

userIcon.addEventListener('click', () => {
  userDropDown.classList.toggle('active');
});

if (window.innerWidth >= 992) {
  bookIcon.setAttribute('src', '../src/images/book-black.svg');
  addDataIcon.setAttribute('src', '../src/images/add-data-black.svg');
}

window.addEventListener('resize', function() {
  if (window.innerWidth >= 992) {
    bookIcon.setAttribute('src', '../src/images/book-black.svg');
    addDataIcon.setAttribute('src', '../src/images/add-data-black.svg');
  } else {
    bookIcon.setAttribute('src', '../src/images/book.svg');
    addDataIcon.setAttribute('src', '../src/images/add-data.svg');
  }
});