<?php 

namespace Controllers;

use \Core\Controller;

class Dashboard extends Controller {
    public function index()
    {
        if(isset($_COOKIE["school"])) {
            $encodedCookie = $_COOKIE["school"];
            $decodedCookie = base64_decode($encodedCookie);
            $cookieValue = explode(" ", $decodedCookie);

            $_SESSION["user"] = [
                "username" => $cookieValue[0],
                "role" => $cookieValue[1],
                "photo" => $cookieValue[2]
            ];
        }

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