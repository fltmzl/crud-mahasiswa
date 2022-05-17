<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="public/css/main.css" />

    <title>School | Database</title>
  </head>
  <body>
    <div class="flex w-full h-screen">
      <!-- Navigation -->
      <nav class="py-5 w-44 border-r h-screen overflow-y-auto">
        <!-- Nav Brand -->
        <div class="flex items-center px-6">
          <!-- Nan Brand Logo -->
          <svg class="text-green-500 h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
            />
          </svg>
          <span class="ml-3 text-xl font-semibold">School</span>
        </div>

        <section class="flex flex-col mt-16 space-y-5 text-gray-500 font-medium text-sm">
          <a href="database.php" class="px-5 py-2 flex items-center space-x-3 navbar-active">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <span> Database </span>
          </a>
          <a href="/" class="px-5 py-2 flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
              />
            </svg>
            <span> Dashboard </span>
          </a>
          <a href="#" class="px-5 py-2 flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span> Calendar </span>
          </a>
          <a href="#" class="px-5 py-2 flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
              />
            </svg>
            <span> Attendance </span>
          </a>
          <a href="#" class="px-5 py-2 flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
              />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span> Setting </span>
          </a>
        </section>
      </nav>

      <!-- Main Section -->
      <main class="py-5 px-6 flex flex-col flex-1 h-screen">
        <!-- Main Section Header -->
        <header class="space-y-6">
          <!-- Header Searchbar -->
          <div class="relative">
            <label class="absolute left-3 top-1/2 -translate-y-1/2" for="search">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </label>
            <input class="bg-gray-100 py-2 pl-10 pr-5 rounded-lg text-sm outline-none focus:ring ring-green-200 w-72" type="text" id="search" name="search" placeholder="Nama, NIM, kelas, telepon..." />
          </div>

          <div class="flex justify-between">
            <!-- Header title  -->
            <h2>Database</h2>

            <!-- Header buttons -->
            <div class="flex space-x-5">
              <button class="btn btn-ternary text-sm">
                <span>Urutkan</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
              </button>

              <button class="btn btn-ternary text-sm relative">
                <span>Filter</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
              </button>
              
              <!-- Dropdown Button -->
              <div class="relative">
                <button class="btn btn-primary text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                  </svg>
                  <span>Tambah</span>
                </button>

                <!-- Dropdown Items -->
                <div class="absolute flex flex-col shadow-lg rounded-lg text-left bg-white">
                  <button id="btn-add-mahasiswa" class="btn text-sm hover:bg-gray-100/70 transition duration-100 ease-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Mahasiswa</span> 
                  </button>
                  <button id="btn-add-dosen" class="btn text-sm hover:bg-gray-100/70 transition duration-100 ease-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Dosen</span> 
                  </button>
                </div>
              </div>
            </div>
          </div>
        </header>

        <section class="mt-8 overflow-hidden flex flex-col flex-1">
          <!-- Table Tabs -->
          <div class="text-sm border-b pb-3 text-gray-500">
            <a class="px-3 pb-3" href="#" id="mahasiswaTabButton">Mahasiswa</a>
            <a class="px-3 pb-3" href="#" id="dosenTabButton">Dosen</a>
          </div>

          <div class="mt-5 basis-full h-full overflow-hidden overflow-y-auto scroll-hide">
            <table id="tableContainer" class="w-full text-left table-auto max-h-4">
              <thead id="headerTableContainer" class="table-container text-sm">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Kelas</th>
                  <th>Telepon</th>
                </tr>
              </thead>
              <tbody id="mainTableContainer" class="table-color-range text-sm">
                <?php for($i = 0; $i < 15; $i++) :?>
                  <tr class="animate-pulse table-row-skeleton">
                    <td><span class="bg-gray-200"></span></td>
                    <td><span class="bg-gray-200"></span></td>
                    <td><span class="bg-gray-200"></span></td>
                    <td><span class="bg-gray-200"></span></td>
                    <td><span class="bg-gray-200"></span></td>
                  </tr>
                <?php endfor ?>
              </tbody>
            </table>
          </div>
        </section>
      </main>

      <!-- Sidebar Section -->
      <aside class="py-5 px-6 w-64 border-l h-screen overflow-y-auto">
        <!-- Logged in account -->
        <section class="border-b pb-5">
          <!-- Account profile -->
          <div class="flex items-center justify-end space-x-3">
            <div class="w-8 aspect-square rounded-full bg-gray-600">
              <img src="" alt="" />
            </div>
            <h5>Abdul Rizki</h5>
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </div>
        </section>

        <!-- Profile -->
        <div id="profileDetailContainer">
          <div class="flex justify-center items-center h-3/4 mt-20">
            <div class="text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3w-32 w-32 mx-auto text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
              </svg>
              <h6>Pilih salah satu dari data untuk melihat detail</h6>
            </div>          
          </div>
        </div>
      </aside>
    </div>

    <!-- JS -->
    <!-- <script src="public/js/ajax.js"></script> -->
  </body>
</html>
