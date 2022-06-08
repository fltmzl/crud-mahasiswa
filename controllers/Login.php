<?php

namespace Controllers;

use Core\Controller;
use Core\Flasher;

class Login extends Controller {
    public function index()
    {
        if(isset($_SESSION["user"])) header("location: " . APP_URL);
    
        $this->view("login/index");
    }

    public function authentication()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $remember = $_POST["remember"] ?? false;

        $result = $this->model("UserModel")->auth($username, $password);
        
        if($result) {
            $string = $result["username"] . " " . $result["role"] . " " . $result["photo"]; 
            $encodedString = base64_encode($string);

            if($remember) setcookie("school", $encodedString, time() + (24*60*60), "/");

            $_SESSION["user"] = [
                "username" => $result["username"],
                "role" => $result["role"],
                "photo" => $result["photo"]
            ];

            header("location: " . APP_URL);
            exit;
        }
        
        Flasher::setFlash("Username atau Password salah.", "Login gagal", "error");
        header("location: " . APP_URL . "/login");
    }
}