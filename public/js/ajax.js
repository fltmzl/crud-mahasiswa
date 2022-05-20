const tableContainer = document.getElementById("tableContainer");
const searchbar = document.getElementById("search");

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
  searchbar.dataset.table = "dosen";

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
  searchbar.dataset.table = "mahasiswa";

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/tableMahasiswa.php`, true);
  xhr.send();
});

// Detail Profile Mahasiswa & Dosen
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

// Cari Data Mahasiswa & Dosen
searchbar.addEventListener("input", () => {
  let keyword = searchbar.value;
  let table = searchbar.dataset.table;

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };

  if (table === "mahasiswa") {
    xhr.open("GET", `ajax/tableMahasiswa.php?keyword=${keyword}`, true);
  } else if (table === "dosen") {
    xhr.open("GET", `ajax/tableDosen.php?keyword=${keyword}`, true);
  }

  xhr.send();
});

// Tambah Mahasiswa
const btnAddMahasiswa = document.getElementById("btnAddMahasiswa");
btnAddMahasiswa.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.body.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/formTambahMahasiswa.php");
  xhr.send();
});
