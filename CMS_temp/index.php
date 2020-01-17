<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new \src\App\Router();

$router->get('/', function() {
    return 'home';
});
$router->get('/about', function() {
    return 'about';
});

$application = new \src\App\Application($router);

$application->run();
