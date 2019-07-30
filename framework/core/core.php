<?php


class App 
{   
    public $routes;


    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function start($uriArr) {
       $cName = array_shift($uriArr);
       $aName = array_shift($uriArr);
       try {
            $this->runController($cName, $aName);
       } catch (httpException $error) {
           $error->sendHttpState();
           $this->runController('errors', 'notfound');
       }

    }

    protected function runController($controller, $action) {
        $cName = strtolower($controller) . 'Controller';
        $aName = strtolower($action) . 'Action';
        if(!file_exists($this->routes['path']['controllers'] . $cName . '.php')) {
           throw new httpException(404, 'Controller File Not Found');
        }
        require_once $this->routes['path']['controllers'] . $cName . '.php';
        if(!class_exists($cName)) {
            throw new httpException(404, 'Controller class not found');
        }
        $controller = new $cName;
        if(!method_exists($controller, $aName)) {
            throw new httpException(404, 'Action' . $aName . 'in' . $cName . 'not found ');
        }
        $controller->$aName();
    }
}