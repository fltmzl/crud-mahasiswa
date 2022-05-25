const HOSTNAME = window.location.hostname;
const APP_URL = `http://${HOSTNAME}/uas-pemrograman-web/public`;

const tableContainer = document.getElementById("tableContainer");
const searchbar = document.getElementById("search");

const capitalizeFirstLetter = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};

class Ajax {
  constructor(htmlElement, loadingElement) {
    this.xhr = new XMLHttpRequest();
    this.xhr.onreadystatechange = () => {
      if (loadingElement) {
        if (this.xhr.readyState == 1) {
          htmlElement.innerHTML = loadingElement;
        }
      }

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

  const loadingElement = `<svg role="status" class="inline w-10 h-10 mr-2 text-gray-200 animate-spin fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
  </svg>`;

  const ajax = new Ajax(profileDetailContainer, loadingElement);
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
