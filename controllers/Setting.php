<?php 

namespace Controllers;

use \Core\Controller;

class Setting extends Controller {
    public function index()
    {
        if(!isset($_SESSION["user"])) header("location: " . APP_URL . "/login");

        $data = [
            "username" => $_SESSION["user"]["username"],
            "role" => $_SESSION["user"]["role"],
            "photo" => $_SESSION["user"]["photo"]
        ];

        $this->view("layouts/header");
        $this->view("dashboard/setting", $data);
        $this->view("layouts/footer", [
            "user" => $_SESSION["user"],
        ]);
    }
}