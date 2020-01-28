<?php

namespace homework5_3_exceptions\calculator;

class Calculator
{
    public static function calculate($number1, $number2, callable $callback)
    {
        return $callback($number1, $number2);
    }
}

class Substractor
{
    public static function substract($number1, $number2)
    {
        return $number1 - $number2;
    }
}

class Multiplier
{
    public function multiply($number1, $number2)
    {
        return $number1 * $number2;
    }
}

function divide($number1 = 0, $number2 = 1)
{
    return $number1 / $number2;
}

$numbers = [
    [$number1 = 10, $number2 = 5],
    [$number1 = 2, $number2 = 1],
    [$number1 = 1, $number2 = 8],
    [$number1 = 0, $number2 = 2],
    [$number1 = -3, $number2 = -5],
];

$multiplier = new Multiplier();

$callbacks = [
        
    function ($number1, $number2)
    {
        return $number1 + $number2;
    },

    [Substractor::class, 'substract'],

    [$multiplier, 'multiply'],

    'homework5_3_exceptions\calculator\divide', 

];

echo '<pre>';
foreach ($numbers as $pair) {

    $format = 'Число 1: <b>%d</b>; Число 2: <b>%d</b>' . PHP_EOL;
    echo sprintf($format, $pair[0], $pair[1]);
   
    foreach ($callbacks as $callback) {
        $result = Calculator::calculate($pair[0], $pair[1], $callback);
        echo $result . PHP_EOL;
    }
}
echo '</pre>';