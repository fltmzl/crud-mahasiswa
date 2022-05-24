<?php 

$totalMahasiswa = $data["totalMahasiswa"];
$totalDosen = $data["totalDosen"];

?>


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
            <h2>Dashboard</h2>
        </div>
    </header>

    <section class="mt-6 flex flex-nowrap space-x-5">
        <!-- Small Card -->
        <div class="custom-shadow-sm flex space-x-5 rounded-lg py-4 px-5 min-w-[250px] max-w-[350px]">
            <div class="w-12 h-12 bg-primary rounded-2xl">
                <img src="" alt="">
            </div>
            <div class="flex flex-col justify-center">
                <h6>Mahasiswa</h6>
                <h3><?= $totalMahasiswa ?></h3>
            </div>
        </div>

        <!-- Small Card -->
        <div class="custom-shadow-sm flex space-x-5 rounded-lg py-4 px-5 min-w-[250px] max-w-[350px]">
            <div class="w-12 h-12 bg-yellow-400 rounded-2xl">
                <img src="" alt="">
            </div>
            <div class="flex flex-col justify-center">
                <h6>Dosen</h6>
                <h3><?= $totalDosen ?></h3>
            </div>
        </div>
    </section>

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