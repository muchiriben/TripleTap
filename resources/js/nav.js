const menuBtn = document.querySelector(".menu-btn");
const sideNav = document.querySelector(".side-navbar");
const navLinks = document.getElementsByClassName("navLink");

let menuOpen = false;
let navOpen = false;
let navLinkClicked = false;

//responsive navigation
menuBtn.addEventListener("click", () => {
    if (!menuOpen) {
        menuBtn.classList.add("open");
        sideNav.classList.add("open");
        menuOpen = true;
        navOpen = true;
      } else {
        menuBtn.classList.remove("open");
        sideNav.classList.remove("open");
        menuOpen = false;
        navOpen = false;
      }
});

for (var i = 0, len = navLinks.length; i < len; i++) {
     navLinks[i].addEventListener("click", () => {
      if (!navLinkClicked) {
        if (menuOpen) {
          menuBtn.classList.remove("open");
          sideNav.classList.remove("open");
          menuOpen = false;
          navOpen = false;
          navLinkClicked = false;
        }
      }
 });
}