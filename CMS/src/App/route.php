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

    public function getMethod()
    {
        return $this->method;
    }

    public function match($method, $uri) : bool
    {
        return ($this->path === $uri && $this->method === $method) ? true : false;
    }

    private function findParams($path, $page)
    {
        $pathArr = explode('/', $path);
        $pageArr = explode('/', $page);

        for ($i = 0; $i < count($pageArr); $i++) {
            if ($pageArr[$i] === '*') {
                $result[] = $pathArr[$i];
            }
        }
        return $result;
    }

    public function run($uri)
    {
        if (strpos($this->path, '*')) {
            $params = $this->findParams($uri, $this->path);
        }

        if (isset($params)) {
            return call_user_func_array($this->prepareCallback($this->callback), $params);
        } else {
            return $this->prepareCallback($this->callback)($uri);
        }
    }
}
