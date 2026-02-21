// HEADER: SHOWING MENU ON CLICK
const menuIcon = document.querySelector(".menu-icon");
const nav = document.querySelector(".mobile-nav");
const header = document.querySelector("header")

menuIcon.addEventListener("click", ()=>{
    nav.classList.toggle("mobile-nav-active");
})
window.addEventListener("scroll", ()=>{
    if(window.scrollY > 90){
        header.style.backgroundColor = "#212529";
    }else{
        header.style.backgroundColor = "transparent";
    }
})