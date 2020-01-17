<?php

namespace src\App;

class Router
{
    public static $currentPage;

    public function get($path, $callback)
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($path === $url) {
            self::$currentPage = $callback();
        }    
    }

    public static function dispatch()
    {
        return self::$currentPage;
    }
}
