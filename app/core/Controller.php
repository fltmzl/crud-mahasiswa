<?php 

namespace Core;

class Controller {
    protected $namespace = "\\Models";

    public function view($view, $data = []) {
        require_once APP_PATH . "views/$view.php";
    }

    public function model($model)
    {
        require_once APP_PATH . "models/$model.php";
        $classWithNamespace = "$this->namespace\\$model";
        return new $classWithNamespace;
    }
}