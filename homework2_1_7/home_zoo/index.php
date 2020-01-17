<?php

namespace home_zoo;

class Dog 
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Cat  
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Fish  
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$cat1 = new Cat('Murzik');
$cat2 = new Cat('Barsik');
$cat3 = new Cat('Kot');

$dog = new Dog('Pes');
$dog1 = new Dog('Psina');
$dog2 = new Dog('Psevich');
$dog3 = new Dog('Psyaka');
$dog4 = new Dog('Pesik');

$fish = new Fish('Pes');
