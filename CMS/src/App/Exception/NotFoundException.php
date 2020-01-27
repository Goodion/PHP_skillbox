<?php

namespace src\App\Exception;
use \src\App\Renderable;

class NotFoundException extends \src\App\Exception\HttpException implements \src\App\Renderable
{
    public function render()
    {
        echo('<pre>');
        echo('Возникла ошибка: ' . $this->getMessage() . ' Код ошибки - ' . $this->getCode());
        echo('</pre>');
    }
}
