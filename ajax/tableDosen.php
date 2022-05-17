<?php 

require_once "../utils/find.php";

$dosen = query("SELECT * FROM dosen");

?>

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