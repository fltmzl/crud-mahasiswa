<?php 

namespace Controllers;

use Core\Controller;

class Ajax extends Controller {
    public function showTableMahasiswa($order, $sort)
    {
        $this->view("ajax/tableMahasiswa", [
            "mahasiswa" => $this->model("MahasiswaModel")->getAll($order, $sort),
        ]);
    }

    public function showTableDosen($order, $sort)
    {
        $this->view("ajax/tableDosen", [
            "dosen" => $this->model("DosenModel")->getAll($order, $sort),
        ]);
    }

    public function profileDetail($table, $id, $actionHidden = false)
    {
        $table = ucwords($table);
        $data = $this->model($table . "Model")->getOne($id);
        $data["role"] = $table;
        $data["table"] = strtolower($table); 

        $this->view("ajax/detailProfile",[
            "data" => $data,
            "actionHidden" => $actionHidden
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