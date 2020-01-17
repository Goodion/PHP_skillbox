<?php

namespace animalsWorld;

abstract class Animal
{
    abstract public function move();
}

abstract class Edible extends Animal
{
    abstract public function toBeEaten();
}

abstract class Danger extends Animal
{
    abstract public function Bite();
}

class Fish extends Edible
{
    public function move()
    {
        echo('плавает');
    }
    
    public function toBeEaten()
    {
        echo('употребляется в пищу');
    }
}

class Tiger extends Danger
{
    public function move()
    {
        echo('ходит');
    }

    public function Bite()
    {
        echo('кусается');
    }
}

class Bear extends Danger
{
    public function move()
    {
        echo('ходит');
    }

    public function Bite()
    {
        echo('кусается');
    }
}

class Moose extends Animal
{
    public function move()
    {
        echo('ходит');
    }
}

class Snake extends Danger
{
    public function move()
    {
        echo('ползает');
    }

    public function Bite()
    {
        echo('жалит');
    }
}

class Chicken extends Edible
{
    public function move()
    {
        echo('ходит');
    }

    public function toBeEaten()
    {
        echo('употребляется в пищу');
    }
}

class Camel extends Animal
{
    public function move()
    {
        echo('ходит');
    }
}

class Elephant extends Animal
{
    public function move()
    {
        echo('ходит');
    }
}

class Dolphin extends Animal
{
    public function move()
    {
        echo('плавает');
    }
}

$fish = new Fish;
$fish->move();
echo('<br />');
$fish->toBeEaten();
