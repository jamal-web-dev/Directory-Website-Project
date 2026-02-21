// HEADER: SHOWING MENU ON CLICK
const menuIcon = document.querySelector(".menu-icon");
const nav = document.querySelector(".mobile-nav");

menuIcon.addEventListener("click", ()=>{
    nav.classList.toggle("mobile-nav-active");
})