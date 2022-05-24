<?php 
namespace Controllers;

use Core\Controller;

class Database extends Controller {
    public function index()
    {
        $this->view("layouts/header");
        $this->view("dashboard/database");
        $this->view("layouts/footer");
    }
}