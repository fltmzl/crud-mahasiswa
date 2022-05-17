<?php 

require_once "../utils/find.php";

isset($_GET["keyword"]) ? $keyword = $_GET["keyword"] : $keyword = "";

$mahasiswa = find($keyword, "mahasiswa");

?>

<thead id="headerTableContainer" class="table-container text-sm">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Kelas</th>
        <th>Telepon</th>
    </tr>
</thead>
<tbody id="mainTableContainer" class="table-container table-color-range text-sm">
    <?php $num = 1; ?>
    <?php foreach($mahasiswa as $mhs) :?>
    <tr class="table-body-row" data-table="mahasiswa" data-detail=<?=$mhs["nim"] ?> onclick="detailProfile(this)">
        <td><?= $num++ ?></td>
        <td><?= $mhs["nama"] ?></td>
        <td><?= $mhs["nim"] ?></td>
        <td><?= $mhs["kelas"] ?></td>
        <td><?= $mhs["telepon"] ?></td>
    </tr>
    <?php endforeach ?>
</tbody>