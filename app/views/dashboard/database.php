

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
        <input class="w-64 py-2 pl-10 pr-5 rounded-lg text-sm outline-none border-gray-200 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50" type="text" id="search" name="search" placeholder="Nama, NIM, kelas, telepon..." data-table="mahasiswa" />
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
                <!-- Button Tambah Mahasiswa -->
                <button id="btnAddMahasiswa" class="btn text-sm hover:bg-gray-100/70 transition duration-100 ease-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>Mahasiswa</span> 
                </button>

                <!-- Button Tambah Dosen -->
                <button id="btnAddDosen" class="btn text-sm hover:bg-gray-100/70 transition duration-100 ease-out">
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

        <div class="mt-5 basis-full h-full overflow-hidden overflow-y-auto">
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

<!-- Form Tambah Mahasiswa -->
<!-- <div id="formTambahMahasiswaContainer" class="absolute inset-0 bg-gray-400/20">
    <form action="">
    <div>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
    </div>
    </form>
</div> -->
