<?php

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new \src\App\Router();

$router->get('/',      \src\App\Controller::class . '@index');
$router->get('/about', \src\App\Controller::class . '@about');

$application = new \src\App\Application($router);


$application->run();
