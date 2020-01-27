<?php

namespace src\App;

final class Config
{
    private static $configs;

    private static $instance = null;

    public static function getInstance(): Config
    {
        if (static::$instance === null) {
            static::$instance = new static();
            self::$configs['db'] = include_once $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
        }

        return static::$instance;
    }

    public function get($config, $default = null)
    {
        return array_get(self::$configs, $config);
    
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
