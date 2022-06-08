<?php 

$mahasiswa = $data["mahasiswa"];

?>

<?php if(count($mahasiswa)) :?>
    <thead id="headerTableContainer" class="table-container text-sm">
        <tr>
            <th>No</th>
            <th onclick="showDataMahasiswa('nama', 'asc')">Nama<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('nim', 'asc')">NIM<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('kelas', 'asc')">Kelas<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('telepon', 'asc')" class="js--teleponColumn">Telepon<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('email', 'asc')" class="js--emailColumn hidden">Email<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('alamat', 'asc')" class="js--alamatColumn hidden">Alamat<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('jenis_kelamin', 'asc')" class="js--jenisKelaminColumn hidden">Jenis Kelamin<i class="fa fa-fw fa-sort"></i></th>
            <th onclick="showDataMahasiswa('tanggal_lahir', 'asc')" class="js--tanggalLahirColumn hidden">Tanggal Lahir<i class="fa fa-fw fa-sort"></i></th>
        </tr>
    </thead>
    <tbody id="mainTableContainer" class="table-container table-color-range text-sm">
        <?php $num = 1; ?>
        <?php foreach($mahasiswa as $mhs) :?>
        <tr class="table-body-row" data-table="mahasiswa" data-detail=<?=$mhs["id"] ?> onclick="detailProfile(this)">
            <td><?= $num++ ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["nim"] ?></td>
            <td><?= $mhs["kelas"] ?></td>
            <td class="js--teleponColumn"><?= $mhs["telepon"] ?></td>
            <td class="js--emailColumn hidden"><?= $mhs["email"] ?></td>
            <td class="js--alamatColumn hidden"><?= $mhs["alamat"] ?></td>
            <td class="js--jenisKelaminColumn hidden"><?= $mhs["jenis_kelamin"] ?></td>
            <td class="js--tanggalLahirColumn hidden"><?= $mhs["tanggal_lahir"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
<?php else : ?>
    <div class="text-center py-16 space-y-8 text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h3>Data tidak ditemukan</h3>
    </div>
<?php endif ?>