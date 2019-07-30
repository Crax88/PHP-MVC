<?php
require_once './config.php';
require_once BASE_PATH . 'framework' . DS . 'core' . DS . 'core.php';
require_once BASE_PATH . 'framework' . DS . 'core' . DS . 'router.php';
$routes = include_once './routes.php';

if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
$app = new App($routes);
$app->start(Router::getUri($_SERVER['REQUEST_URI']));








// class httpException extends Exception
// {
//     public function __construct(int $code = 0, string $msg = '') {
//         parent::__construct($msg, $code);
//     }
// }


