<?php 

namespace Controllers;

use Core\Controller;

class Logout extends Controller {
    public function index()
    {
        session_destroy();

        header("location: " . APP_URL . "/login");
    }
}