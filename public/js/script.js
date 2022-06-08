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
    closeAllDropdown();

    const dropdownItem = dropdown.querySelector(".js--dropdown-item");
    dropdownItem.classList.remove("invisible");

    e.stopPropagation();
  });
}

// Table Column Show Filter
const toggleFilterTable = (toggleColumn, column) => {
  const columnToggle = document.querySelector(toggleColumn);

  if (columnToggle) {
    columnToggle.addEventListener("change", ({ target }) => {
      const columns = document.querySelectorAll(column);
      for (const column of columns) {
        target.checked ? column.classList.remove("hidden") : column.classList.add("hidden");
      }
    });
  }
};

toggleFilterTable("#emailColumnToggle", ".js--emailColumn");
toggleFilterTable("#teleponColumnToggle", ".js--teleponColumn");
toggleFilterTable("#alamatColumnToggle", ".js--alamatColumn");
toggleFilterTable("#jenisKelaminColumnToggle", ".js--jenisKelaminColumn");
toggleFilterTable("#tanggalLahirColumnToggle", ".js--tanggalLahirColumn");
