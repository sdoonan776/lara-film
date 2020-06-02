const menuBtn = document.querySelector('.navbar-btn');
// console.log(menuBtn);
const closeBtn = document.querySelector('.close-btn');
let sideNav = document.getElementById('mobile-nav');

menuBtn.addEventListener('click', function () {
    console.log('wagwan');
    sideNav.style.width = "300px";
});

closeBtn.addEventListener('click', function () {
    sideNav.style.width = "0px";
});