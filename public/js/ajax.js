const tableContainer = document.getElementById("tableContainer");

// Tampilkan semua data Mahasiswa saat Load pertama kali
const mahasiswaTabButton = document.getElementById("mahasiswaTabButton");
const dosenTabButton = document.getElementById("dosenTabButton");
window.addEventListener("load", () => {
  mahasiswaTabButton.classList.add("database-tab-active");

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/tableMahasiswa.php", true);
  xhr.send();
});

// Tampikan data Dosen
dosenTabButton.addEventListener("click", () => {
  mahasiswaTabButton.classList.remove("database-tab-active");
  dosenTabButton.classList.add("database-tab-active");

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/tableDosen.php`, true);
  xhr.send();
});

// Tampikan data Mahasiswa
mahasiswaTabButton.addEventListener("click", () => {
  mahasiswaTabButton.classList.add("database-tab-active");
  dosenTabButton.classList.remove("database-tab-active");

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/tableMahasiswa.php`, true);
  xhr.send();
});

// Detail Mahasiswa
const profileDetailContainer = document.getElementById("profileDetailContainer");
const detailProfile = (e) => {
  const id = e.dataset.detail;
  const table = e.dataset.table;

  // Membuat objek AJAX
  let xhr = new XMLHttpRequest();

  // Cek AJAX
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      profileDetailContainer.innerHTML = xhr.responseText;
    }
  };

  // Eksekusi AJAX
  xhr.open("GET", `ajax/detailProfile.php?table=${table}&detailData=${id}`, true);
  xhr.send();
};

// Cari Mahasiswa
const searchbar = document.getElementById("search");
searchbar.addEventListener("input", () => {
  let keyword = searchbar.value;

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/tableMahasiswa.php?keyword=${keyword}`, true);
  xhr.send();
});
