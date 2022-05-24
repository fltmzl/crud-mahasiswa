// Navbar Active
const navLinks = document.getElementsByClassName("nav--link");

let { pathname } = window.location;
let navActive = pathname.split("/")[3];
if (navActive === "") navActive = "dashboard";

for (const nav of navLinks) {
  if (nav.dataset.navbar === navActive) {
    nav.classList.add("navbar-active");
  }
}
