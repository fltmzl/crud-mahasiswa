<?php 

namespace Controllers;

use Core\Controller;

class Ajax extends Controller {
    public function showTableMahasiswa()
    {

        $this->view("ajax/tableMahasiswa", [
            "mahasiswa" => $this->model("MahasiswaModel")->getAll(),
        ]);
    }

    public function showTableDosen()
    {
        $this->view("ajax/tableDosen", [
            "dosen" => $this->model("DosenModel")->getAll(),
        ]);
    }

    public function profileDetail($table, $id)
    {
        $table = ucwords($table);
        $data = $this->model($table . "Model")->getOne($id);
        $data["role"] = $table;
        $data["table"] = strtolower($table); 

        $this->view("ajax/detailProfile",[
            "data" => $data,
        ]);
    }

    public function search()
    {   
        // Get data POST yang dikirim dari ajax
        $table = $_POST["table"];
        $keyword = $_POST["keyword"];

        $viewPath = "ajax/table" . ucwords($table);
        $model = ucwords($table) . "Model";

        $data = $this->model($model)->search($keyword);

        $this->view($viewPath, [
            $table => $data,
        ]);
    }
}