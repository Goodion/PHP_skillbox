<?php

namespace src\App;

class Router
{
    public static $registeredPages;

    public function get($path, $callback)
    {
        self::$registeredPages[$path] = $callback();
    }

    public static function dispatch()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        if (array_key_exists($url, self::$registeredPages)) {
            if (self::$registeredPages[$url] instanceof Renderable) {
                self::$registeredPages[$url]->render();
            } else {
                return self::$registeredPages[$url];
            }
        } else {
            return 'ERROR 404';
        }
    }
}
