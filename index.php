<?php
require_once './config.php';
require_once BASE_PATH . 'framework' . DS . 'core' . DS . 'core.php';
$routes = include_once './routes.php';
if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}


$app = new Core($routes);
$app->lunch($_SERVER['REQUEST_URI']);


//var_dump($app);










// class httpException extends Exception
// {
//     public function __construct(int $code = 0, string $msg = '') {
//         parent::__construct($msg, $code);
//     }
// }


