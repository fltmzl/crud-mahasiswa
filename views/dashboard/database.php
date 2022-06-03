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
            <div class="relative js--dropdown-toggle">
                <button class="btn btn-primary text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah</span>
                </button>

                <!-- Dropdown Items -->
                <div class="absolute flex flex-col shadow-lg rounded-lg text-left bg-white invisible js--dropdown-item">
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
        <a class="px-3 pb-3 cursor-pointer database-tab-active" id="mahasiswaTabButton">Mahasiswa</a>
        <a class="px-3 pb-3 cursor-pointer" id="dosenTabButton">Dosen</a>
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

<!-- Form Mahasiswa -->
<div id="dialogBackdrop" class="z-50 flex justify-center items-center absolute inset-0 bg-gray-900/50 overflow-y-scroll invisible">
    <svg role="status" class="inline w-10 h-10 mr-2 text-gray-200 animate-spin fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
</div>
