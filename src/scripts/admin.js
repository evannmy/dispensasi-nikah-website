const hamburgerMenu = document.querySelector('.hamburger-menu');
const hamburgerCloseMenu = document.querySelector('.hamburger-menu-close');
const offScreenMenu = document.querySelector('.off-screen-menu');
const darkBackground = document.querySelector('.dark-bg');
const userIcon = document.querySelectorAll('nav img')[1];
const userIcon2 = document.querySelectorAll('.desktop-heading img')[1];
const userDropDown = document.querySelector('.user-dropdown');
const bookIcon = document.querySelectorAll('.off-screen-menu ul li a img')[0];
const addDataIcon = document.querySelectorAll('.off-screen-menu ul li a img')[1];
const settingIcon = document.querySelectorAll('.off-screen-menu ul li a img')[2];

hamburgerMenu.addEventListener('click', () => {
  offScreenMenu.classList.add('active');
  darkBackground.classList.add('active');
});

hamburgerCloseMenu.addEventListener('click', () => {
  offScreenMenu.classList.remove('active');
  darkBackground.classList.remove('active');
});

userIcon.addEventListener('click', () => {
  userDropDown.classList.toggle('active');
});

userIcon2.addEventListener('click', () => {
  userDropDown.classList.toggle('active');
});

window.addEventListener('click',function(event){
  if (event.target != hamburgerMenu && event.target.parentNode != hamburgerMenu && event.target != offScreenMenu && event.target.parentNode != offScreenMenu){
    if (offScreenMenu.classList.contains('active')) {
      offScreenMenu.classList.remove('active');
      darkBackground.classList.remove('active');
    }
  }
  
  if (event.target != userIcon && event.target.parentNode != userIcon && event.target != userIcon2 && event.target.parentNode != userIcon2 && event.target != userDropDown && event.target.parentNode != userDropDown) {
    if (userDropDown.classList.contains('active')) {
      userDropDown.classList.remove('active');
    }
  }
}); 

if (window.innerWidth >= 992) {
  bookIcon.setAttribute('src', 'src/images/icon/book-black.svg');
  addDataIcon.setAttribute('src', 'src/images/icon/add-data-black.svg');
  settingIcon.setAttribute('src', 'src/images/icon/setting-icon-black.svg');
}

window.addEventListener('resize', function() {
  if (window.innerWidth >= 992) {
    bookIcon.setAttribute('src', 'src/images/icon/book-black.svg');
    addDataIcon.setAttribute('src', 'src/images/icon/add-data-black.svg');
    settingIcon.setAttribute('src', 'src/images/icon/setting-icon-black.svg');
  } else {
    bookIcon.setAttribute('src', 'src/images/icon/book.svg');
    addDataIcon.setAttribute('src', 'src/images/icon/add-data.svg');
    settingIcon.setAttribute('src', 'src/images/icon/setting-icon.svg');
  }
});