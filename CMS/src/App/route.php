<?php

namespace src\App;

class Route
{
    private $method;
    private $path;
    private $callback;

    private static function getClassMethod($inputSting) 
    {
        $classMethod = str_replace('@', '::', $inputSting);
        return $classMethod;
    }

    public function __construct($path, $callback, $method)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    private function prepareCallback($callback)
    {
        if (is_string($callback) && strpos($callback, '@')) {
            return self::getClassMethod($callback);
        } else {
            return $callback;
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function match($method, $uri) : bool
    {
        return ($this->path === $uri && $this->method === $method) ? true : false;
    }

    public function run($uri)
    {
        return $this->prepareCallback($this->callback)($uri);
    }
}
