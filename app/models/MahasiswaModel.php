<?php

namespace Models;

use \Core\Database;
use PDO;

class MahasiswaModel extends Database {
    public function getAll()
    {
        $this->query("SELECT * FROM mahasiswa");
        return $this->resultAll();
    }

    public function getOne($id)
    {
        $this->query("SELECT * FROM mahasiswa WHERE nim=:id");
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
}