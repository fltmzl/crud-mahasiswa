<?php 
namespace Controllers;

use Core\Controller;
use Core\Flasher;

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
        $data = [
            "post" => $_POST,
            "files" => $_FILES
        ];

        $table = ucwords($table);
        $result = $this->model($table . "Model")->store($data);
        
        if($result) {
            Flasher::setFlash("Berhasil", "menambahkan data", "success");
        } else {
            Flasher::setFlash("Gagal", "menambahkan data, mungkin ada duplikasi data", "error");
        } 
        
        header("location: ". APP_URL . "/database");
    }
    
    public function destroy($table, $id)
    {
        $table = ucwords($table);
        $result = $this->model($table . "Model")->delete($id);

        if($result) {
            Flasher::setFlash("Berhasil", "menghapus data", "success");
        } else {
            Flasher::setFlash("Gagal", "menghapus data", "error");
        } 
        
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
        $data = [
            "post" => $_POST,
            "files" => $_FILES
        ];

        $table = ucwords($table);
        $result = $this->model($table . "Model")->update($data);

        if($result) {
            Flasher::setFlash("Berhasil", "mengedit data", "success");
        } else {
            Flasher::setFlash("Gagal", "mengedit data, mungkin ada duplikasi data", "error");
        } 
        
        header("location: " . APP_URL . "/database");
    }
}