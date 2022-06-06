<?php

class Docs extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        require __DIR_ROOT__ . '/public/vendor/autoload.php';

        $openapi = \OpenApi\scan(__DIR_ROOT__ . '/app/controllers');

        return [
            'status_code_header' => 'HTTP/1.1 200 OK',
            'body' => $openapi->toJSON()
        ];
    }

    public function swagger() {
        $this->smarty->assign([
            'sheet1' => file_get_contents('../app/swagger-ui/dist/swagger-ui.css'),
            'sheet2' => file_get_contents('../app/swagger-ui/dist/index.css'),
            'js1' => file_get_contents('../app/swagger-ui/dist/swagger-ui-bundle.js'),
            'js2' => file_get_contents('../app/swagger-ui/dist/swagger-ui-standalone-preset.js'),
            'js3' => file_get_contents('../app/swagger-ui/dist/swagger-initializer.js')
        ]);
        $this->view('swagger');

        return '';
    }
}
