<?php 

$title = $data["title"] ?? "Tambah Data Dosen";
$dosen = $data["data"] ?? [];
$buttonLabel = !$dosen ? "Tambah" : "Edit"; // jika $dosen kosong, brrti Tambah Data

$formAction = !$dosen ? APP_URL ."/database/store/dosen" : APP_URL ."/database/update/dosen";

$id = $dosen["id"] ?? "";
$nama = $dosen["nama"] ?? "";
$nidn = $dosen["nidn"] ?? "";
$tanggalLahir = $dosen["tanggal_lahir"] ?? "";
$email = $dosen["email"] ?? "";
$telepon = $dosen["telepon"] ?? "";
$jenisKelamin = $dosen["jenis_kelamin"] ?? "";
$alamat = $dosen["alamat"] ?? "";
$photo = $dosen["photo"] ?? "pp.jpg";

?>


<div id="dialogBox" class="w-3/4 max-w-xl h-[90vh] px-6 py-4 overflow-auto rounded-lg bg-gray-50">
    <h2 class="text-center mb-5">
        <?= $title ?>
    </h2>
    <form action="<?= $formAction ?>" method="POST" enctype="multipart/form-data" class="space-y-6 text-sm">
        <div>
            <label class="block mb-1" for="nama">Nama</label>
            <input class="custom-form-input" type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $nama ?>" required />
        </div>
        <div>
            <label class="block mb-1" for="nidn">Nidn</label>
            <input class="custom-form-input" type="number" name="nidn" id="nidn" placeholder="XXXXXXXXXXX" value="<?= $nidn ?>" required/>
        </div>
        <div>
            <label class="block mb-1" for="tanggalLahir">Tangal Lahir</label>
            <input class="custom-form-input" type="date" name="tanggalLahir" id="tanggalLahir" placeholder="1 Januari 1990" value="<?= $tanggalLahir ?>" required />
        </div>
        <div>
            <label class="block mb-1" for="email">Email</label>
            <input class="custom-form-input" type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="<?= $email ?>" required />
        </div>
        <div>
            <label class="block mb-1" for="telepon">Telepon</label>
            <input class="custom-form-input" type="tel" name="telepon" id="telepon" placeholder="0000-0000-0000-0000" value="<?= $telepon ?>" required />
        </div>
        <div class="col-span-full">
            <label class="block mb-1">Jenis Kelamin</label>

            <label for="laki-laki" class="mr-3">
                <input class="custom-form-input text-primary" type="radio" name="jenisKelamin" id="laki-laki" value="laki-laki" required <?= $jenisKelamin == "Laki-laki" ? "checked" : null ?> />
                Laki-laki
            </label>
            
            <label for="perempuan">
                <input class="custom-form-input text-primary" type="radio" name="jenisKelamin" id="perempuan" value="perempuan" required <?= $jenisKelamin == "Perempuan" ? "checked" : null ?>/>
                Perempuan
            </label>
        </div>
        <div class="col-span-full">
            <label class="block mb-1" for="photo">Foto Profil</label>
            <img src="img/<?= $photo ?>" alt="profile-photo" width="150" class="rounded-full my-10">
            <input class="custom-form-input resize-none" type="file" name="photo" id="photo"/>
        </div>
        <div class="col-span-full">
            <label class="block mb-1" for="alamat">Alamat</label>
            <textarea class="custom-form-input resize-none" name="alamat" id="alamat" cols="30" rows="3" required ><?= $alamat ?></textarea>
        </div>

        <?php if($dosen) : ?>
            <input type="text" name="id" value="<?= $id ?>" hidden>
            <input type="text" name="oldPhoto" value="<?= $photo ?>" hidden>
        <?php endif ?>
        
        <div class="col-span-full flex justify-end space-x-5">
            <button class="btn btn-ternary" type="button" onclick="closeDialog()">Batal</button>
            <button class="btn btn-primary" type="submit"><?= $buttonLabel ?></button>
        </div>
    </form>
</div>