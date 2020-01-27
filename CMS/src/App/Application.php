<?php

namespace src\App;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    public function initialize()
    {
        $capsule = new Capsule;
        $config = Config::getInstance();
        $capsule->addconnection($config->get('db'));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function run()
    {
        try {
            echo(\src\App\Router::dispatch());
        } catch (\Exception $e) {
            \src\App\Exception\NotFoundException::renderException($e);
        }
    }
}
