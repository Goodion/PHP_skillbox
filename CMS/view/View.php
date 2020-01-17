<?php

namespace view;

class View implements \src\App\Renderable
{   
    public function __construct($path, $callback)
    {
        $this->path = str_replace('.', '/', $path);
        $this->file = VIEW_DIR . str_replace('\\', '/', $this->path) . '.php';
        $this->title = $callback['title'];
    }

    public function render()
    {
        echo('<pre>');
        echo($this->title);
        echo('</pre>');
        include $this->file;
    }
}