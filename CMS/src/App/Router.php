<?php

namespace src\App;
use \src\App\Exception\HttpException as HttpException,
    \src\App\Exception\NotFoundException as NotFoundException,
    \src\App\Renderable as Renderable,
    \src\App\Route as Route;

class Router
{
    private $registeredPages;

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

    public function dispatch()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        if (array_key_exists($path, $this->registeredPages)) {
            if ($this->registeredPages[$path]->match($method, $path)) {
                if ($this->registeredPages[$path]->run($path) instanceof Renderable) {
                    $this->registeredPages[$path]->run($path)->render();
                } else {
                    return $this->registeredPages[$path]->run($path);
                }
            } else {
                throw new HttpException('Метод передачи ' . $method . ' не сооветствует маршруту.', 405);
            }
                
        } else {
            throw new NotFoundException('Путь ' . $path . ' не найден на сервере.', 404);
        }
    }
}
