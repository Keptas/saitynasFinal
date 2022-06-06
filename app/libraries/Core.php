<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController;
    protected $currentMethod;
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        if(!@file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
            $this->closeConnection();
        }
        
        $this->currentController = ucwords($url[0]);
        unset($url[0]);

        require_once '../app/controllers/'. $this->currentController . '.php';

        if($this->currentController == 'Docs') {
            if(!isset($url[1])) {
                $url[1] = 'index';
            }
        }

        $this->currentController = new $this->currentController;
        
        if(!isset($url[1]) && !method_exists($this->currentController, $url[1])){
            $this->closeConnection();
        }
        
        $this->currentMethod = $url[1];
        unset($url[1]);
        
        
        $this->params = $this->getUrlParams() ?: [];
        try {
            $headers = call_user_func_array([$this->currentController, $this->currentMethod], []);
        }
        catch(ArgumentCountError $e) {
            $this->closeConnection();
        }

        if(!empty($headers)) {
            $this->setHeaders();
            header($headers['status_code_header']);
    
            if(isset($headers['body'])) {
                echo $headers['body'];
            }
        }
    }
    private function getUrl() {
      if(isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }

    private function getUrlParams() {
        $get = $_GET;
        unset($get['url']);
        if(!empty($get)) {
            return $get;
        }
        return false;
    }

    private function closeConnection() {
        header("HTTP/1.1 404 Not Found");
        exit();
    }

    private function setHeaders() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }  
}


