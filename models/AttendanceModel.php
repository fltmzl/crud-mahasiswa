<?php 

namespace Models;

use \Core\Database;
use PDO;

class AttendanceModel extends Database {
    public function getAll()
    {
        $this->query("SELECT * FROM kehadiran ORDER BY `date` DESC LIMIT 7");
        return array_reverse($this->resultAll());
    }

    public function getOne($date)
    {
        $this->query("SELECT * FROM kehadiran WHERE `date`='$date'");
        return $this->resultOne();
    }

    public function store($data)
    {   
        $date = $data["date"];
        $totalMahasiswa = $data["totalMahasiswa"];
        $totalDosen = $data["totalDosen"];
        
        $this->query("INSERT INTO kehadiran (`date`, `total_hadir_mahasiswa`, `total_hadir_dosen`)
                        VALUES (:date, :totalMahasiswa, :totalDosen)");

        $this->bind(":date", $date, PDO::PARAM_STR);
        $this->bind(":totalMahasiswa", $totalMahasiswa, PDO::PARAM_STR);
        $this->bind(":totalDosen", $totalDosen, PDO::PARAM_STR);

        return $this->rows();
    }
}