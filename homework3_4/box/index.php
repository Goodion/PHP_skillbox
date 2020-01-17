<?php

namespace box;

class Box
{
    public function putBall(Ball $ball)
    {
        Ball::$count += 1;
        echo('В корзину добавлен мяч') . PHP_EOL;
    }
}

class Ball
{
    public static $count;
}

$box = new Box;

for ($i = 0; $i < rand(5, 25); $i++) {
    $box->putBall(new Ball);
}

echo(Ball::$count);
