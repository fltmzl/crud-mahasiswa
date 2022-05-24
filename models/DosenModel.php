<?php 

namespace Models;

use \Core\Database;
use PDO;

class DosenModel extends Database {
    public function getAll()
    {
        $this->query("SELECT * FROM dosen");
        return $this->resultAll();
    }

    public function getOne($id)
    {
        $this->query("SELECT * FROM dosen WHERE nidn=:id");
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
}