const HOSTNAME = window.location.hostname;
const APP_URL = `http://${HOSTNAME}/uas-pemrograman-web/public`;

const tableContainer = document.getElementById("tableContainer");
const searchbar = document.getElementById("search");

const capitalizeFirstLetter = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};

class Ajax {
  constructor(htmlElement) {
    this.xhr = new XMLHttpRequest();
    this.xhr.onreadystatechange = () => {
      if (this.xhr.readyState == 4 && this.xhr.status == 200) {
        htmlElement.innerHTML = this.xhr.responseText;
      }
    };
  }

  open(method = "GET", url) {
    this.xhr.open(method, url, true);
  }

  send(data) {
    this.xhr.send(data);
  }

  contentType(contentType) {
    this.xhr.setRequestHeader("Content-type", contentType);
  }
}

// Tampilkan semua data Mahasiswa saat Load pertama kali
const mahasiswaTabButton = document.getElementById("mahasiswaTabButton");
const dosenTabButton = document.getElementById("dosenTabButton");
window.addEventListener("load", () => {
  mahasiswaTabButton.classList.add("database-tab-active");

  const ajax = new Ajax(tableContainer);
  ajax.open("GET", `${APP_URL}/ajax/showTableMahasiswa`);
  ajax.send();
});

// Tampikan data Dosen
dosenTabButton.addEventListener("click", () => {
  mahasiswaTabButton.classList.remove("database-tab-active");
  dosenTabButton.classList.add("database-tab-active");
  searchbar.dataset.table = "dosen";

  const ajax = new Ajax(tableContainer);
  ajax.open("GET", `${APP_URL}/ajax/showTableDosen`);
  ajax.send();
});

// Tampikan data Mahasiswa
mahasiswaTabButton.addEventListener("click", () => {
  mahasiswaTabButton.classList.add("database-tab-active");
  dosenTabButton.classList.remove("database-tab-active");
  searchbar.dataset.table = "mahasiswa";

  const ajax = new Ajax(tableContainer);
  ajax.open("GET", `${APP_URL}/ajax/showTableMahasiswa`);
  ajax.send();
});

// Detail Profile Mahasiswa & Dosen
const profileDetailContainer = document.getElementById("profileDetailContainer");
const detailProfile = (e) => {
  const id = e.dataset.detail;
  const table = e.dataset.table;

  const ajax = new Ajax(profileDetailContainer);
  ajax.open("GET", `${APP_URL}/ajax/profileDetail/${table}/${id}`);
  ajax.send();
};

// Cari Data Mahasiswa & Dosen
searchbar.addEventListener("input", () => {
  let keyword = searchbar.value;
  let table = searchbar.dataset.table;

  const ajax = new Ajax(tableContainer);

  if (keyword) {
    ajax.open("POST", `${APP_URL}/ajax/search`);
    ajax.contentType("application/x-www-form-urlencoded");
    ajax.send(`table=${table}&keyword=${keyword}`);
  } else {
    ajax.open("GET", `${APP_URL}/ajax/showTable${capitalizeFirstLetter(table)}`);
    ajax.send();
  }
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
