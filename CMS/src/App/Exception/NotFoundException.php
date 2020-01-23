<?php

namespace src\App\Exception;

class NotFoundException extends \src\App\Exception\HttpException implements \src\App\Renderable 
{

    public static function renderException(\Exception $e)
    {
        if ($e instanceof \src\App\Renderable) {
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

    public function render()
    {
        echo('<pre>');
        echo('Возникла ошибка: ' . $this->getMessage() . ' Код ошибки - ' . $this->getCode());
        echo('</pre>');
    }
};