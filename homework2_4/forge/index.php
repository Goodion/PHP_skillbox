<?php

interface Renderable
{
    public function render($name);
}

interface CanBurn
{
    public function burn();
}

class Forge 
{
    public function burn(CanBurn $object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame implements Renderable
{
    public function render($name)
    {
        return $name . " гори синим пламенем";
    }
}

class RedFlame implements Renderable
{
    public function render($name)
    {
        return $name . " загорелся";
    }
}

class Smoke implements Renderable
{
    public function render($name)
    {
        return $name . " лишь задымился";
    }
}

class AllThat implements CanBurn
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function burn()
    {
        return new BlueFlame;
    }

    public function __toString()
    {
        return $this->name;
    }
}

class Brain implements CanBurn
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function burn()
    {
        return new Smoke;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}

class Bonfire implements CanBurn
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function burn()
    {
        return new RedFlame;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}

class Seat implements CanBurn
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function burn()
    {
        return new RedFlame;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}

class Meat implements CanBurn
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function burn()
    {
        return new Smoke;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}

$allThat = new AllThat('Оно всё');
$brain = new Brain('Мозг');
$bonfire = new Bonfire('Костёр');
$seat = new Seat('Сиденье');
$meat = new Meat('Стейк');
$meat = new Meat('Котлета');

$forge = new Forge();

$forge->burn($allThat);
$forge->burn($brain);
$forge->burn($bonfire);
$forge->burn($seat);
$forge->burn($meat);
