<?php

namespace src\App;

class Application
{
    public function run()
    {
        echo(\src\App\Router::dispatch());
    }
}
