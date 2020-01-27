<?php

interface Renderable
{
    public function render($string);
}

interface Formatter
{
    public function format($string);
}

class Display
{
    public static function show($formatter, $string)
    {
        if ($formatter instanceof Renderable) {
            $formatter->render($string);
        } else if ($formatter instanceof Formatter || method_exists($formatter, 'format')) {
            $formatter->format($string);
        } else {
            echo($string);
        }
    }
}

class Tag implements Renderable
{
    public function render($string)
    {
        $arr = explode('@@', $string);
        if (count($arr) === 2) {
            echo('<' . $arr[0] . '>' . $arr[1] . '</' . $arr[0] . '>');
        } else {
            echo($arr[0]);
        }
        
    }
}

class Str implements Formatter
{
    public function format($string)
    {
        $string = mb_strtoupper($string);
        echo($string);
    }
}

class Num 
{
    public function format($string)
    {
        $result = iconv_strlen($string);
        echo($result);
    }
}

$arr = [
    'h2@@Lorem ipsum dolor sit amet consectetur',
    'h1@@adipisicing elit. Illo suscipit',
    'h3@@adipisicing elit. Illo suscipit quam aperiam',
    'adipisicing elit. Illo suscipit quam aperiam',
    'adipisicing elit. Illo suscipit quam aperiam',
    'Illo suscipit quam aperiam quibusdam',
    'iusto nulla, dolorem in aut. Mollitia',
    'adipisicing elit.   dolore quod voluptas dolorum autem',
    ' , ipsam iure explicabo! Autem, mollitia recusandae!',
    'h4@@adipisicing elit. Illo suscipit quam aperiam',
];

foreach ($arr as $item) {
    echo ('<br />');
    Display::show(new Tag, $item);
    echo ('<br />');
    Display::show(new Str, $item);
    echo ('<br />');
    Display::show(new Num, $item);
}
