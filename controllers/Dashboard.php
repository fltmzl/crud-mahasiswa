<?php 

namespace Controllers;

use \Core\Controller;

class Dashboard extends Controller {
    public function index()
    {
        $this->view("layouts/header");
        $this->view("dashboard/index", [
            "totalMahasiswa" => $this->model("MahasiswaModel")->totalRow(),
            "totalDosen" => $this->model("DosenModel")->totalRow(),
        ]);
        $this->view("layouts/footer");
    }
}