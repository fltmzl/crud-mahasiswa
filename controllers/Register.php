<?php 

namespace Controllers;

use Core\Controller;

class Register extends Controller {
    public function index()
    {
        if(isset($_SESSION["user"])) header("location: " . APP_URL);

        $this->view("register/index");
    }

    public function store()
    {
        $result = $this->model("UserModel")->store($_POST);

        if($result) header("location: ". APP_URL);
    }
}