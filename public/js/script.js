// Navbar Active
const navLinks = document.getElementsByClassName("nav--link");

let { pathname } = window.location;
let navActive = pathname.split("/")[3];
if (navActive === "") navActive = "dashboard";

for (const nav of navLinks) {
  if (nav.dataset.navbar === navActive) {
    nav.classList.add("navbar-active");
  } else {
    nav.classList.remove("navbar-active");
  }
}

// Close Dialog box
const closeDialog = () => {
  dialogBackdrop.classList.add("invisible");
};

if (dialogBackdrop) {
  dialogBackdrop.addEventListener("mousedown", ({ target }) => {
    if (target == dialogBackdrop) closeDialog();
  });
}

// Find dropdown items and close it
const closeAllDropdown = () => {
  const dropdownItem = document.getElementsByClassName("js--dropdown-item");
  for (const dropdown of dropdownItem) {
    dropdown.classList.add("invisible");
  }
};

// Close Dropdown when click outside
document.addEventListener("click", () => {
  closeAllDropdown();
});

// Toggle Dropdown
const dropdownToggle = document.getElementsByClassName("js--dropdown-toggle");
for (const dropdown of dropdownToggle) {
  dropdown.addEventListener("click", (e) => {
    console.log(e.target);
    closeAllDropdown();

    const dropdownItem = dropdown.querySelector(".js--dropdown-item");
    dropdownItem.classList.remove("invisible");

    e.stopPropagation();
  });
}
