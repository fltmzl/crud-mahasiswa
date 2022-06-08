<?php

$totalMahasiswa = $data["totalMahasiswa"];
$totalDosen = $data["totalDosen"];

?>

<!-- Main Section -->
<main class="py-5 px-6 space-y-8 flex flex-col flex-1 h-screen overflow-scroll">
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
            <h2>Dashboard</h2>
        </div>
    </header>

    <section class="mt-6 flex flex-nowrap space-x-5">
        <!-- Small Card -->
        <div class="custom-shadow-sm flex space-x-5 rounded-lg py-4 px-5 min-w-[250px] max-w-[350px]">
            <div class="w-12 h-12 grid place-items-center text-white bg-primary rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h6>Mahasiswa</h6>
                <h3><?= $totalMahasiswa ?></h3>
            </div>
        </div>

        <!-- Small Card -->
        <div class="custom-shadow-sm flex space-x-5 rounded-lg py-4 px-5 min-w-[250px] max-w-[350px]">
            <div class="w-12 h-12 grid place-items-center text-white bg-yellow-400 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h6>Dosen</h6>
                <h3><?= $totalDosen ?></h3>
            </div>
        </div>
    </section>

    <section id="chartContainer" class="w-full space-y-10">
        <div class="p-5 custom-shadow-sm bg-white rounded-lg space-y-5">
            <h4>Attendance Overview</h4>
            <canvas id="overviewChart" width="400" height="150"></canvas>
        </div>
    </section>

    <section class="py-5 min-h-[700px] overflow-hidden rounded-lg flex flex-col flex-1 bg-white custom-shadow-sm">
        <div class="relative">
            <!-- Table Tabs -->
            <div class="text-sm border-b pb-3 text-gray-500">
                <a class="px-3 pb-3 cursor-pointer database-tab-active" id="mahasiswaTabButton">Mahasiswa</a>
                <a class="px-3 pb-3 cursor-pointer" id="dosenTabButton">Dosen</a>
            </div>

            <!-- Table Dropdown -->
            <div id="btnTableColumnFilter" class="absolute right-0 top-0 js--dropdown-toggle">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
                <div class="py-4 px-5 min-w-max absolute right-0 invisible js--dropdown-item bg-white custom-shadow-sm text-xs space-y-2 rounded-lg">
                    <label for="emailColumnToggle" class="flex items-center space-x-3">
                        <input type="checkbox" id="emailColumnToggle">
                        <span>Email</span>
                    </label>
                    <label for="alamatColumnToggle" class="flex items-center space-x-3">
                        <input type="checkbox" id="alamatColumnToggle">
                        <span>Alamat</span>
                    </label>
                    <label for="teleponColumnToggle" class="flex items-center space-x-3">
                        <input type="checkbox" id="teleponColumnToggle" checked>
                        <span>Telepon</span>
                    </label>
                    <label for="jenisKelaminColumnToggle" class="flex items-center space-x-3">
                        <input type="checkbox" id="jenisKelaminColumnToggle">
                        <span>Jenis Kelamin</span>
                    </label>
                    <label for="tanggalLahirColumnToggle" class="flex items-center space-x-3">
                        <input type="checkbox" id="tanggalLahirColumnToggle">
                        <span>Tanggal Lahir</span>
                    </label>
                </div>
            </div>
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