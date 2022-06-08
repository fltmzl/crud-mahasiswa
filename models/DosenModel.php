<?php 

namespace Models;

use \Core\Database;
use PDO;

class DosenModel extends Database {
    public function getAll($order = "nama", $sort = "asc")
    {
        $this->query("SELECT * FROM dosen ORDER BY $order $sort");
        return $this->resultAll();
    }

    public function getOne($id)
    {
        $this->query("SELECT * FROM dosen WHERE id=:id");
        $this->bind(":id", $id, PDO::PARAM_INT);
        return $this->resultOne();
    }

    public function totalRow()
    {
        $this->query("SELECT nama FROM dosen");
        return $this->rows();
    }

    public function search($keyword)
    {
        $this->query("SELECT * FROM dosen WHERE 
                        nama LIKE :keyword OR 
                        nidn LIKE :keyword OR 
                        email LIKE :keyword OR
                        telepon LIKE :keyword");
        $this->bind(":keyword", "%$keyword%", PDO::PARAM_STR);
        return $this->resultAll();
    }
    
    public function store($data)
    {
        $post = $data["post"]; // from $_POST
        $files = $data["files"]; // from $_FILES

        $nama = $post["nama"];
        $nidn = $post["nidn"];
        $tanggalLahir = $post["tanggalLahir"];
        $email = $post["email"];
        $telepon = $post["telepon"];
        $jenisKelamin = $post["jenisKelamin"];
        $alamat = $post["alamat"];
        $photo = $this->uploadFiles($files);

        $this->query("INSERT INTO dosen
                     (nidn, nama, photo, tanggal_lahir, email, telepon, jenis_kelamin, alamat)
                      VALUES (:nidn, :nama, :photo, :tanggalLahir, :email, :telepon, :jenisKelamin, :alamat)");
                        
        $this->bind(":nidn", $nidn, PDO::PARAM_STR);
        $this->bind(":nama", $nama, PDO::PARAM_STR);
        $this->bind(":photo", $photo, PDO::PARAM_STR);
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
        $nidn = $post["nidn"];
        $tanggalLahir = $post["tanggalLahir"];
        $email = $post["email"];
        $telepon = $post["telepon"];
        $jenisKelamin = $post["jenisKelamin"];
        $alamat = $post["alamat"];
        $oldPhoto = $post["oldPhoto"];
        $photo = $this->uploadFiles($files);

        if(!$photo) $photo = $oldPhoto;

        $this->query("UPDATE dosen
                     SET nidn=:nidn,
                         nama=:nama, 
                         photo=:photo,
                         tanggal_lahir=:tanggalLahir, 
                         email=:email, 
                         telepon=:telepon, 
                         jenis_kelamin=:jenisKelamin, 
                         alamat=:alamat 
                     WHERE id=:id");

        $this->bind(":id", $id, PDO::PARAM_STR);
        $this->bind(":nidn", $nidn, PDO::PARAM_STR);
        $this->bind(":nama", $nama, PDO::PARAM_STR);
        $this->bind(":photo", $photo, PDO::PARAM_STR);
        $this->bind(":tanggalLahir", $tanggalLahir, PDO::PARAM_STR);
        $this->bind(":email", $email, PDO::PARAM_STR);
        $this->bind(":telepon", $telepon, PDO::PARAM_STR);
        $this->bind(":jenisKelamin", $jenisKelamin, PDO::PARAM_STR);
        $this->bind(":alamat", $alamat, PDO::PARAM_STR);

        return $this->rows();
    }

    public function delete($id)
    {
        $this->query("DELETE FROM dosen WHERE id = :id");
        $this->bind(":id", $id, PDO::PARAM_STR);

        return $this->rows();
    }
}