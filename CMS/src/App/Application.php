<?php

namespace src\App;
use Illuminate\Database\Capsule\Manager as Capsule,
\src\App\Router as Router,
\src\App\Exception as Exception;

class Application
{
    public function __construct($router)
    {
        $this->router = $router;
    }
    
    public function initialize()
    {
        $capsule = new Capsule;
        $config = Config::getInstance();
        $capsule->addconnection($config->get('db'));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function renderException(\Exception $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            if ($e->getCode() !== 0) {
                $errorCode = $e->getCode();
            } else {
                $errorCode = 500;
            }
            echo('Возникла ошибка: ' . $e->getMessage() . ' Код ошибки - ' . $errorCode);
        }
    }

    public function run()
    {
        try {
            echo($this->router->dispatch());
        } catch (\Exception $e) {
            $this->renderException($e);
        }
    }
}
