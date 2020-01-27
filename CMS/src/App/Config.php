<?php

namespace src\App;

final class Config
{
    private $configs;

    private static $instance = null;

    public static function getInstance(): Config
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function get($config, $default = null)
    {
        return array_get($this->configs, $config);
    
    }

    private function __construct()
    {
        $this->configs['db'] = include_once $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
