<?php

namespace view;

class View implements \src\App\Renderable
{
    public function __construct($path, $callback)
    {
        $this->path = str_replace('.', '/', $path);
        $this->file = VIEW_DIR . str_replace('\\', '/', $this->path) . '.php';
        $this->title = $callback['title'];
        $this->header = VIEW_DIR . 'layout/header.php';
        $this->footer = VIEW_DIR . 'layout/footer.php';
    }

    public function render()
    {
        include $this->header;
        echo('<div class="h1">' . $this->title . '</div>' . PHP_EOL);
        include $this->file;
        include $this->footer;
    }
}
