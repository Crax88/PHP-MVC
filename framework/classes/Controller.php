<?php

class Controller 
{
    protected $layout = 'homeLayout';
    public function __construct($layout) {
        $this->layout = $layout;
    }
    protected function renderLayout($params = []) {
            foreach ($params as $name => $value) {
                $$name = $value;
            }
          include_once APP_PATH . 'views' .  DS . 'layouts' . DS . $this->layout . '.php';
    }
    protected function renderTemplate() {

    }
}