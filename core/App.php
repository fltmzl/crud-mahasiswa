<?php 

class App {
    protected $controller = "Dashboard";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Set Controller
        if($url != null) {
            if(file_exists(APP_PATH . "controllers/$url[0].php")) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        
        require_once APP_PATH . "controllers/$this->controller.php";
        $this->controller = new $this->controller;
        
        // Set Method
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Set Params
        if(!empty($url)) {
            $this->params = array_values($url);
        }
        
        // Panggil method dari Class yg sudah di instance (kirim juga params)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if(isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            $url[0] = ucwords($url[0]); // diubah kapital karena digunakan untuk instansiasi Class
            
            return $url;
        }
    }
}