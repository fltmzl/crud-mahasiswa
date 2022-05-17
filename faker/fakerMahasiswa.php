<?php
    require_once '../vendor/autoload.php';
    use Faker\Factory;

    require_once "../utils/db.php";

    $faker = Factory::create("id_ID");

    $arrayKelas = [
        "S1 Sistem Informasi",
        "S1 Teknik Komputer",
        "S1 Akuntansi",
        "S1 Manajemen",
        "D3 Teknik Komputer",
        "S1 Teknik Sipil",
        "S1 Teknik Kimia"
    ];

    $arrayJenisKelamin = ["Laki-laki", "Perempuan"];

    function seedMahasiswa() {
        global $conn;
        global $faker;
        global $arrayKelas;
        global $arrayJenisKelamin;

        for($i = 0; $i < 30; $i++) {
            $nim = $faker->unique()->randomNumber(9);
            $nama = $faker->firstName() . " " . $faker->lastName();
            $kelas = $arrayKelas[array_rand($arrayKelas,1)];
            $tanggalLahir = $faker->dateTimeBetween('1998-01-01', '2003-01-01')->format('Y-m-d');
            $email = $faker->email();
            $telepon = $faker->phoneNumber();
            $jenisKelamin = $arrayJenisKelamin[array_rand($arrayJenisKelamin,1)];
            $alamat = $faker->address();

            $query = "INSERT INTO mahasiswa (nim, nama, kelas, tanggal_lahir, email, telepon, jenis_kelamin, alamat) VALUES('$nim', '$nama', '$kelas', '$tanggalLahir', '$email', '$telepon', '$jenisKelamin', '$alamat')";
    
            mysqli_query($conn, $query);
            echo mysqli_affected_rows($conn);
        }    
    }

    seedMahasiswa()
?>