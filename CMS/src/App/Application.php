<?php

namespace src\App;

class Application
{
    public function run()
    {
        try {
            echo(\src\App\Router::dispatch());
        } catch (\Exception $e) {
            \src\App\Exception\NotFoundException::renderException($e);
        }
    }
}
