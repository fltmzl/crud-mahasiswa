<?php 
namespace Controllers;

use Core\Controller;

class Database extends Controller {
    public function index()
    {
        if(!isset($_SESSION["user"])) header("location: " . APP_URL . "/login");

        $this->view("layouts/header");
        $this->view("dashboard/database");
        $this->view("layouts/footer", [
            "user" => $_SESSION["user"],
        ]);
    }

    public function create($table)
    {
        if($table === "mahasiswa") $this->view("ajax/formMahasiswa");
        if($table === "dosen") $this->view("ajax/formDosen");
    }

    public function store($table)
    {   
        $table = ucwords($table);
        $result = $this->model($table . "Model")->store($_POST);
        
        header("location: ". APP_URL . "/database");
    }
    
    public function destroy($table, $id)
    {
        $table = ucwords($table);
        $result = $this->model($table . "Model")->delete($id);
        
        header("location: " . APP_URL . "/database");
    }

    public function edit($table, $id)
    {   
        $table = ucwords($table);
        $data = $this->model($table . "Model")->getOne($id);
        
        $this->view("ajax/form" . $table, [
            "title" => "Edit Data " . $table,
            "data" => $data,
        ]);
    }

    public function update($table)
    {
        $table = ucwords($table);
        $result = $this->model($table . "Model")->update($_POST);
        
        header("location: " . APP_URL . "/database");
    }
}