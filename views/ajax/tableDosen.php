<?php 

$dosen = $data["dosen"];

?>

<?php if(count($dosen)) :?>
    <thead id="headerTableContainer" class="table-container text-sm">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Email</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody id="mainTableContainer" class="table-container table-color-range text-sm">
        <?php $num = 1; ?>
        <?php foreach($dosen as $dsn) :?>
        <tr class="table-body-row" data-table="dosen" data-detail=<?=$dsn["nidn"] ?> onclick="detailProfile(this)">
            <td><?= $num++ ?></td>
            <td><?= $dsn["nama"] ?></td>
            <td><?= $dsn["nidn"] ?></td>
            <td><?= $dsn["email"] ?></td>
            <td><?= $dsn["telepon"] ?></td>
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