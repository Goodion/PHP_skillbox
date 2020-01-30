<?php

use \src\App\Controller as Controller,
    \view\View as View,
    \src\App\Application as Application,
    \src\Model\Book as Book;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once APP_DIR . '/view/View.php';

$router = new \src\App\Router();

$router->get('/', function() {
    return 'home';
});

$router->get('/about', function() {
    return 'about';
}); 

$router->get('/', Controller::class . '@index');

$router->get('/about', Controller::class . '@about');

$router->get('/', function() {
    return new View('index', ['title' => 'index Page']);
});

$router->get('/about', function() {
    return new View('about', ['title' => 'about Page']);
});

$router->post('/post', function() {
    return new View('post', ['title' => 'POST PAGE']);
});

$router->get('/new', function() {
    print_r(Book::all());
    return new View('new.new', ['title' => 'NEW Page']);
});

$router->get('/test', function() {
    return new View('new.test', ['title' => 'TEST PAGE']);
});

$router->get( '/test/*/test2/*', function ($param1, $param2) {
    return "Test page with param1=$param1 param2=$param2" ;
});

$router->get( '/posts/*/', function () {
    return new View('new.posts', ['title' => 'posts Page']);
});

$application = new Application($router);

$application->initialize();
$application->run();
