<?php 

namespace Controllers;

use Core\Controller;
use Core\Flasher;

class Register extends Controller {
    public function index()
    {
        if(isset($_SESSION["user"])) header("location: " . APP_URL);

        $this->view("register/index");
    }

    public function store()
    {
        $result = $this->model("UserModel")->store($_POST);
        
        if($result) {
            header("location: ". APP_URL . "/login");
            exit;
        } 
        
        Flasher::setFlash("Username atau Email telah digunakan.", "Register gagal", "error");
        header("location: " . APP_URL . "/register");
    }
}