<?php

class Router 
{
    public static function getUri($str) {
        $controllerName = 'home';
        $actionName = 'index';
        $uri = explode('/', $str);
        
        if(!empty($uri[1])) {
            $controllerName = $uri[1];
        }
        if(!empty($uri[2])) {
            $actionName = $uri[2];
        }
       return array($controllerName, $actionName);
    }
}