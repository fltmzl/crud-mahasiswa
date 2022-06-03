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

        $result = $this->model("UserModel")->auth($username, $password);
        
        if($result) {
            $string = $result["username"] . " " . $result["role"];
            $encodedString = base64_encode($string);

            $_SESSION["user"] = [
                "username" => $result["username"],
                "role" => $result["role"]
            ];

            header("location: " . APP_URL);
        }
        
        echo "LOGIN GAGAL";
    }
}