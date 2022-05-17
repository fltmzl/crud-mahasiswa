<?php 
    require_once '../vendor/autoload.php';
    use Faker\Factory;

    require_once "../utils/db.php";

    $faker = Factory::create("id_ID");

    $arrayJenisKelamin = ["Laki-laki", "Perempuan"];

    function seedDosen() {
        global $conn;
        global $faker;
        global $arrayJenisKelamin;

        for($i = 0; $i < 15; $i++) {
            $nidn = $faker->unique()->randomNumber(9);
            $nama = $faker->name() . " " . $faker->suffix();
            $tanggalLahir = $faker->dateTimeBetween('1975-01-01', '1990-01-01')->format('Y-m-d');
            $email = $faker->email();
            $telepon = $faker->phoneNumber();
            $jenisKelamin = $arrayJenisKelamin[array_rand($arrayJenisKelamin,1)];
            $alamat = $faker->address();

            $query = "INSERT INTO dosen (nidn, nama, tanggal_lahir, email, telepon, jenis_kelamin, alamat) VALUES('$nidn', '$nama', '$tanggalLahir', '$email', '$telepon', '$jenisKelamin', '$alamat')";
    
            mysqli_query($conn, $query);
            echo mysqli_affected_rows($conn);
        }    
    }

    seedDosen();
?>