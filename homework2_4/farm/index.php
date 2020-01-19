<?php

namespace homework2_4\farm;

abstract class Animal
{
    abstract public function say();
    abstract public function walk();
}

class Cow extends Animal
{
    public $steps = 'топ-топ';
    public $voice = 'му-му';
    public $name = 'Коровка';

    public function say()
    {   
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function walk()
    {
        echo('<br />');
        echo($this->name . ' идёт - ' . $this->steps);
        echo('<br />');
    }
}

class Pig extends Animal
{
    public $steps = 'топ-топ';
    public $voice = 'хрю-хрю';
    public $name = 'Хрюшка';

    public function say()
    {
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function walk()
    {
        echo('<br />');
        echo($this->name . ' идёт - ' . $this->steps);
        echo('<br />');
    }
}

class Chicken extends Animal
{
    public $steps = 'топ-топ';
    public $voice = 'ко-ко';
    public $name = 'Курица';

    public function say()
    {
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function walk()
    {
        echo('<br />');
        echo($this->name . ' идёт - ' . $this->steps);
        echo('<br />');
    }
}

class Farm
{
    public $animals;

    public function __construct()
    {
        $this->animals = [];
    }
    
    public function addAnimal(Animal $animal)
    {
        $animal->walk();
        $this->animals[] = $animal;
    }

    public function rollCall()
    {
        $tmp = null;
        $count = count($this->animals);
        $result = [];

        function randomizerCheckUnique(&$result, $count)
        {
            $tmp = mt_rand(0, $count - 1);
            if (array_search($tmp, $result) !== false) {
                randomizerCheckUnique($result, $count);
            } else {
                $result[] += $tmp;
                return $result;
            }
        }

        for ($i = 0; $i < $count; $i++) {
            randomizerCheckUnique($result, $count);
            $this->animals[$result[$i]]->say();
        } 
    }
}

$farm = new Farm();

$farm->addAnimal(new Cow());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Chicken());

$farm->rollCall();
