<?php

namespace src\App;

class Application
{
    public function run()
    {
        echo Router::dispatch();
    }
}