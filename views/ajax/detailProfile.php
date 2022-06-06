<?php 

$data = $data["data"];

$photoSrc = $data["photo"] ?? "pp.jpg";
$telepon = $data["telepon"];
$email = $data["email"];

?>

<div class="space-y-10 self-start mt-5">
    <section class="w-full text-center space-y-3 relative">
        <!-- Action Button -->
        <div class="right-2 absolute flex flex-col space-y-3">
            <?php $id = $data["nim"] ?? $data["nidn"] ?>

            <!-- Edit Button -->
            <button id="btnEdit" class="p-2 rounded-lg bg-gray-200 hover:text-primary hover:bg-secondary/30 text-sm duration-300 ease-out" title="Edit" data-id="<?= $data["id"] ?>" data-table="<?= $data["table"] ?>" onclick="editData(this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
            </button>

            <!-- Delete Button -->
            <a id="btnDelete" href="<?= APP_URL ?>/database/destroy/<?= $data["table"] ?>/<?= $data["id"] ?>" class="p-2 rounded-lg bg-gray-200 hover:text-red-600 hover:bg-red-50 text-sm duration-300 ease-out" title="Delete" onclick="return confirm('Apa anda yakin ingin menghapus data tersebut')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </a>
        </div>

        <!-- Profile Picture -->
        <div class="w-20 aspect-square rounded-full overflow-hidden bg-green-100 mx-auto">
            <img src="img/<?= $photoSrc ?>" alt="profile-photo" />
        </div>

        <!-- Profile Name -->
        <div>
            <h4 class="font-semibold"><?=$data["nama"] ?></h4>
            <h6 class="capitalize"><?= $data["role"] ?></h6>
        </div>

        <!-- Profile Contact -->
        <div class="space-x-4">
            <!-- Message Button -->
            <button class="text-gray-500 bg-gray-100 rounded-full p-2 hover:bg-gray-700 hover:text-gray-100 duration-300" title="Message">
                <a href="sms:<?= $telepon ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
            </button>
            
            <!-- Phone Button -->
            <button class="text-gray-500 bg-gray-100 rounded-full p-2 hover:bg-gray-700 hover:text-gray-100 duration-300" title="Phone">
                <a href="tel:<?= $telepon ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                        />
                    </svg>
                </a>
            </button>

            <!-- Email Button -->
            <button class="text-gray-500 bg-gray-100 rounded-full p-2 hover:bg-gray-700 hover:text-gray-100 duration-300" title="Email">
                <a href="mailto:<?= $email ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </a>
            </button>
        </div>
    </section>

    <!-- Profile Details -->
    <section class="grid grid-cols-2 gap-y-5 gap-x-1 px-2">
        <div class="space-y-2 col-span-full">
            <h5>Alamat</h5>
            <h6><?=$data["alamat"] ?></h6>
        </div>
        <div class="space-y-2 col-span-full">
            <h5>Email</h5>
            <h6 class="overflow-hidden overflow-x-auto scroll-hide"><?=$data["email"] ?></h6>
        </div>
        <div class="space-y-2">
            <h5>Umur</h5>
            <?php $age = $data["tanggal_lahir"] ?>
            <h6><?=$age ?></h6>
        </div>
        <div class="space-y-2">
            <h5>Jenis Kelamin</h5>
            <h6><?=$data["jenis_kelamin"] ?></h6>
        </div>
        <div class="space-y-2">
            <h5>Tanggal Lahir</h5>
            <h6><?=$data["tanggal_lahir"] ?></h6>
        </div>
        <div class="space-y-2">
            <h5>Telepon</h5>
            <h6><?=$data["telepon"] ?></h6>
        </div>
    </section>
</div>
