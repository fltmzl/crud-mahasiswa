<?php

namespace Models;

use Core\Database;
use Core\Flasher;
use PDO;

class MahasiswaModel extends Database {
    public function getAll($order = "nama", $sort = "asc")
    {
        $this->query("SELECT * FROM mahasiswa ORDER BY $order $sort");
        return $this->resultAll();
    }

    public function getOne($id)
    {
        $this->query("SELECT * FROM mahasiswa WHERE id=:id");
        $this->bind(":id", $id, PDO::PARAM_INT);
        return $this->resultOne();
    }

    public function totalRow()
    {
        $this->query("SELECT nama FROM mahasiswa");
        return $this->rows();
    }

    public function search($keyword)
    {
        $this->query("SELECT * FROM mahasiswa WHERE 
                        nama LIKE :keyword OR 
                        nim LIKE :keyword OR 
                        email LIKE :keyword OR 
                        kelas LIKE :keyword OR 
                        telepon LIKE :keyword");
        $this->bind(":keyword", "%$keyword%", PDO::PARAM_STR);
        return $this->resultAll();
    }

    public function store($data)
    {
        $post = $data["post"]; // from $_POST
        $files = $data["files"]; // from $_FILES

        $nama = $post["nama"];
        $nim = $post["nim"];
        $kelas = $post["kelas"];
        $tanggalLahir = $post["tanggalLahir"];
        $email = $post["email"];
        $telepon = $post["telepon"];
        $jenisKelamin = $post["jenisKelamin"];
        $alamat = $post["alamat"];
        $photo = $this->uploadFiles($files);
        
        $this->query("INSERT INTO mahasiswa
                     (nim, nama, photo, kelas, tanggal_lahir, email, telepon, jenis_kelamin, alamat)
                      VALUES (:nim, :nama, :photo, :kelas, :tanggalLahir, :email, :telepon, :jenisKelamin, :alamat)");
                        
        $this->bind(":nim", $nim, PDO::PARAM_STR);
        $this->bind(":nama", $nama, PDO::PARAM_STR);
        $this->bind(":photo", $photo, PDO::PARAM_STR);
        $this->bind(":kelas", $kelas, PDO::PARAM_STR);
        $this->bind(":tanggalLahir", $tanggalLahir, PDO::PARAM_STR);
        $this->bind(":email", $email, PDO::PARAM_STR);
        $this->bind(":telepon", $telepon, PDO::PARAM_STR);
        $this->bind(":jenisKelamin", $jenisKelamin, PDO::PARAM_STR);
        $this->bind(":alamat", $alamat, PDO::PARAM_STR);

        return $this->rows();
    }

    public function update($data)
    {
        $post = $data["post"];
        $files = $data["files"];

        $id = $post["id"];
        $nama = $post["nama"];
        $nim = $post["nim"];
        $kelas = $post["kelas"];
        $tanggalLahir = $post["tanggalLahir"];
        $email = $post["email"];
        $telepon = $post["telepon"];
        $jenisKelamin = $post["jenisKelamin"];
        $alamat = $post["alamat"];
        $oldPhoto = $post["oldPhoto"];
        $photo = $this->uploadFiles($files);

        if(!$photo) $photo = $oldPhoto;

        $this->query("UPDATE mahasiswa
                     SET nim=:nim,
                         nama=:nama,
                         photo=:photo, 
                         kelas=:kelas, 
                         tanggal_lahir=:tanggalLahir, 
                         email=:email, 
                         telepon=:telepon, 
                         jenis_kelamin=:jenisKelamin, 
                         alamat=:alamat 
                     WHERE id=:id");

        $this->bind(":id", $id, PDO::PARAM_STR);
        $this->bind(":nim", $nim, PDO::PARAM_STR);
        $this->bind(":nama", $nama, PDO::PARAM_STR);
        $this->bind(":photo", $photo, PDO::PARAM_STR);
        $this->bind(":kelas", $kelas, PDO::PARAM_STR);
        $this->bind(":tanggalLahir", $tanggalLahir, PDO::PARAM_STR);
        $this->bind(":email", $email, PDO::PARAM_STR);
        $this->bind(":telepon", $telepon, PDO::PARAM_STR);
        $this->bind(":jenisKelamin", $jenisKelamin, PDO::PARAM_STR);
        $this->bind(":alamat", $alamat, PDO::PARAM_STR);

        return $this->rows();
    }

    public function delete($id)
    {
        $this->query("DELETE FROM mahasiswa WHERE id = :id");
        $this->bind(":id", $id, PDO::PARAM_STR);

        return $this->rows();
    }
}