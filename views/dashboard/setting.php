<?php 
$username = $data["username"];
$role = $data["role"];
$photo = $data["photo"] ?? "pp.jpg";

?>

<div class="flex-1 flex items-center px-16">
    <div>
        <h2 class="font-semibold mb-10">Setting</h2>
        <div class="flex items-center space-x-5">
            <div>
                <img src="img/<?= $photo ?>" alt="" width="120" class="rounded-full overflow-hidden">
            </div>
            <div>
                <h5><?= $username ?></h5>
                <h6><?= $role ?></h6>
            </div>
        </div>
    </div>
</div>