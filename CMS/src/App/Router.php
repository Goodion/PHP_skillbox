<?php

namespace src\App;
use \src\App\Exception\HttpException as HttpException,
    \src\App\Exception\NotFoundException as NotFoundException,
    \src\App\Renderable as Renderable,
    \src\App\Route as Route;

class Router
{
    private $registeredPages;
    private $registeredRegularPages;

    public function get($path, $callback, $method = 'GET')
    {
        $path = '/' . trim($path, '/');
        $this->registeredPages[$path] = new Route($path, $callback, $method);
    }

    public function post($path, $callback, $method = 'POST')
    {
        $path = '/' . trim($path, '/');
        $this->registeredPages[$path] = new Route($path, $callback, $method);
    }

    private function findRoute($path)
    {
        foreach ($this->registeredPages as $page => $route) {
            if (preg_match('/^' . str_replace([ '*' , '/' ], [ '\w+' , '\/' ], $page) . '$/', $path)) {
                return $route;
            }
        }
        return false;
    }
    
    public function dispatch()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $registeredRoute = $this->findRoute($path);

        if ($registeredRoute) {
            if ($registeredRoute->match($method, $registeredRoute->getPath())) {
                if ($registeredRoute->run($path) instanceof Renderable) {
                    $registeredRoute->run($path)->render();
                } else {
                    return $registeredRoute->run($path);
                }
            } else {
                throw new HttpException('Метод передачи ' . $method . ' не сооветствует маршруту.', 405);
            }
                
        } else {
            throw new NotFoundException('Путь ' . $path . ' не найден на сервере.', 404);
        }
    }
}
