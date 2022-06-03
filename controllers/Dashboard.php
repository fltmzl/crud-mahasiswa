<?php 

namespace Controllers;

use \Core\Controller;

class Dashboard extends Controller {
    public function index()
    {
        if(!isset($_SESSION["user"])) header("location: " . APP_URL . "/login");

        $this->view("layouts/header");
        $this->view("dashboard/index", [
            "totalMahasiswa" => $this->model("MahasiswaModel")->totalRow(),
            "totalDosen" => $this->model("DosenModel")->totalRow(),
        ]);
        $this->view("layouts/footer", [
            "user" => $_SESSION["user"],
        ]);
    }
}