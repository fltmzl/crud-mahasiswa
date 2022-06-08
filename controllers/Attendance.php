<?php 

namespace Controllers;

use Core\Controller;
use Core\Flasher;

class Attendance extends Controller {
    public function index()
    {
        if(!isset($_SESSION["user"])) header("location: " . APP_URL . "/login");

        $this->view("layouts/header");
        $this->view("dashboard/attendance");
        $this->view("layouts/footer", [
            "user" => $_SESSION["user"],
            "attendanceTab" => true,
        ]);
    }

    public function getAll()
    {
        $result = $this->model("AttendanceModel")->getAll();
        header("Content-Type: application/json");
        echo json_encode($result);
    }
    
    public function getTotalMahasiswa()
    {
        $result = $this->model("MahasiswaModel")->totalRow();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function getTotalDosen()
    {
        $result = $this->model("DosenModel")->totalRow();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function getOne()
    {
        $today = date("Y-m-d");

        $result = $this->model("AttendanceModel")->getOne($today);
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function create()
    {
        $this->view("ajax/formAttendance");
    }

    public function store()
    {   
        $result = $this->model("AttendanceModel")->store($_POST);
        
        if($result) {
            Flasher::setFlash("Berhasil", "menambahkan data", "success");
        } else {
            Flasher::setFlash("Gagal", "menambahkan data, mungkin ada duplikasi data", "error");
        } 
        
        header("location: ". APP_URL . "/attendance");
    }
}