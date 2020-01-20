<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';
require_once APP_DIR . '/view/View.php';

$router = new \src\App\Router();

$router->get('/', function() {
    return 'home';
});

$router->get('/about', function() {
    return 'about';
});

$router->get('/', \src\App\Controller::class . '@index');
$router->get('/about', \src\App\Controller::class . '@about');

$router->get('/test', function() {
    return new view\View('index', ['title' => 'Index Page']);
});

$router->get('/new', function() {
    return new view\View('test.test.index', ['title' => 'Глубокая']);
});

$application = new \src\App\Application($router);

$application->run();
