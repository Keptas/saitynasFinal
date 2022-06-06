<?php
    require '../public/Smarty/libs/Smarty.class.php';
    //Load the model and the view
    class Controller {
        public function __construct()
        {
            $this->smarty = new Smarty;
        }
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) {;
            if(file_exists('../app/views/' . $view . '.tpl')) {
                ob_start();
                $this->smarty->clearAllCache();
                $this->smarty->assign([
                    'content' => __DIR_ROOT__ . '/app/views/' . $view . '.tpl'
                ]);

                $this->smarty->display('../app/templates/main.tpl');
            } else {
                throw new Exception('View does not exists.');
            }
        }

        protected function notFoundResponse() {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = null;
            return $response;
        }

        protected function response($data) {
            $this->createUserHistory();
            if($data == false) return $this->notFoundResponse();

            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            if(!is_bool($data)){
                $response['body'] = json_encode((array) $data);
            }

            return $response;
        }

        protected function createUserHistory() : void {
            if(isset($_SERVER)) $fullInfo = base64_encode(json_encode($_SERVER, true));
            if(isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
            if(isset($_SERVER['REQUEST_SCHEME'])) $scheme = $_SERVER['REQUEST_SCHEME'];
            if(isset($_SERVER['REQUEST_URI'])) $uri = $_SERVER['REQUEST_URI'];


            if(!isset($fullInfo) || !isset($ip) || !isset($scheme) || !isset($uri)) {
                $this->notFoundResponse();
            }
            
            $this->model('User_History')->logAction($ip, $scheme, $uri, $fullInfo);
        }
    }
