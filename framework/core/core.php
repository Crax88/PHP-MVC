<?php

spl_autoload_register('Core::autoload');

class Core 
{
    private $pathes = false;

    public function __construct($pathes) {
        $this->pathes = $pathes['path'];
    }

    public static function autoload($name){
        include BASE_PATH . 'framework' . DS . 'classes' . DS . $name . '.php';
    }
    public function lunch($uri) {
        $controllerName = 'controllerHome';
        $actionName = 'actionIndex';
        $route = explode(' ', trim(str_replace('/', ' ', $uri)));
        
        if(!empty($route[0])) {
            $controllerName = 'controller' . ucfirst($route[0]);
        }
        if(!empty($route[1])) {
            $actionName = 'action' . ucfirst($route[1]);
        }
        try {
            $this->runController($controllerName, $actionName);
        } catch (httpException $error) {
            $error->sendHttpState();
            $this->runController('controllerErrors', 'action' . $error->getCode());
        }
    }
    private function runController($controllerName, $actionName) {
        $controllerFile = $this->pathes['controllers'] . $controllerName . '.php';
        if(file_exists($controllerFile)) {
            include_once $controllerFile;
        } else {
            throw new httpException(404, 'controller' . $controllerName . 'not found in' . $controllerFile);
        }
        $controller = new $controllerName(strtolower(str_replace('controller', '', $controllerName)) . 'Layout');
        if(method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            throw new httpException(404, $actionName . 'not found in' . $controllerFile);
        }
    }
    // public function getPathes() {
    //     return $this->pathes;
    // }
}