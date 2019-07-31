<?php

class controllerErrors extends Controller 
{
    public function __construct($layoutName) {
        parent::__construct($layoutName);
    }
    public function action404() {
        $code = 404;
        $host = $_SERVER['HTTP_HOST'];
        $page = $_SERVER['REQUEST_URI'];
        $message = 'Sorry page ' . $page . ' not found at www.' . $host;
        $layoutPath = APP_PATH . 'views' . DS . 'layouts' . DS . $this->layout . '.php';
        $this->renderLayout(['code' => $code, 'message' => $message]);
    }
}