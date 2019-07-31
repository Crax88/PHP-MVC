<?php

class controllerHome extends Controller 
{
    public function __construct($layoutName) {
        parent::__construct($layoutName);
    }
    public function actionIndex() {
        $layoutPath = APP_PATH . 'views' . DS . 'layouts' . DS . $this->layout . '.php';
        $this->renderLayout();
    }
}