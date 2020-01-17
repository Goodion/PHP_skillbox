<?php

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . " гори синим пламенем";
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . " загорелся";
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . " лишь задымился";
    }
}

class AllThat
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

class Brain
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

class Bonfire
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

class Seat
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

class Meat
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

$forge = new Forge();

$forge->burn($allThat);
$forge->burn($brain);
$forge->burn($bonfire);
$forge->burn($seat);
$forge->burn($meat);
