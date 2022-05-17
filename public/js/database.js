const dropdownBtn = document.getElementsByClassName("dropdown-btn");

for (const btn of dropdownBtn) {
  btn.addEventListener("click", () => {
    console.log("dropdown open");
  });
}
