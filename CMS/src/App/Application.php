<?php

namespace src\App;

class Application
{
    public function run()
    {
        $template = \src\App\Router::dispatch();
        if ($template instanceof Renderable) {
            $template->render();
        } else {
            echo(\src\App\Router::dispatch());
        }
    }
}
