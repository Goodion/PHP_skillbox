<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';
require_once APP_DIR . '/view/View.php';

$router = new \src\App\Router();

/* $router->get('/', function() {
    return 'home';
});

$router->get('/about', function() {
    return 'about';
}); 

$router->get('/', \src\App\Controller::class . '@index');
$router->get('/about', \src\App\Controller::class . '@about'); */

$router->get('/', function() {
    return new view\View('index', ['title' => 'index Page']);
});

$router->get('/about', function() {
    return new view\View('about', ['title' => 'about Page']);
});
$router->get('/new', function() {
    print_r(\src\Model\Book::all());
    return new view\View('new.new', ['title' => 'NEW Page']);
});

$router->get('/test', function() {
    return new view\View('new.test', ['title' => 'TEST PAGE']);
});

$application = new \src\App\Application($router);

$application->initialize();
$application->run();
