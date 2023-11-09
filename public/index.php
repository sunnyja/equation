<?php

use vendor\core\Router;

error_reporting(-1);

define('PUB_PATCH', __DIR__); // var/www/html/public
define('CORE', dirname(__DIR__) . '/vendor/core'); // var/www/html/vendor/core
define('ROOT', dirname(__DIR__)); // var/www/html
define('APP', dirname(__DIR__) . '/app'); //  var/www/html/app

$query = rtrim($_SERVER['REQUEST_URI'], '/');
$query = ltrim($_SERVER['REQUEST_URI'], '/');
require '../vendor/libs/debug.php';

spl_autoload_register(function ($className) {
    $file = ROOT . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

Router::addToRoutes('^$', ['controller' => 'Main', 'action' => 'index']);
Router::dispatch($query);