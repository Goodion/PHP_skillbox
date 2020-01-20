<?php

namespace src\App;

class Router
{
    public static $registeredPages;

    private static function getClassMethod($inputSting) 
    {
        $classMethod = str_replace('@', '::', $inputSting);
        return $classMethod;
    }

    public function get($path, $callback)
    {
        self::$registeredPages[$path] = $callback;
    }

    public static function dispatch()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        if (array_key_exists($path, self::$registeredPages)) {
                        
            $callback = self::$registeredPages[$path];
            
            if (is_string($callback) && strpos($callback, '@')) {
                $callback = self::getClassMethod($callback);
            }

            if ($callback() instanceof Renderable) {
                $callback()->render();
            } else {
                return $callback();
            }
        } else {
            return 'ERROR 404';
        }
    }
}
