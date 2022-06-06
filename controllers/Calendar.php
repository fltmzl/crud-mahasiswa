<?php 

namespace Controllers;

use Core\Controller;

class Calendar extends Controller { 
    public function index()
    {
        $this->view("layouts/header");
        $this->view("dashboard/calendar");
        $this->view("layouts/footer");
    }
}