<?php

namespace homework2_4\farm;

class Animal
{
    protected $name;
    protected $voice;
    protected $steps = 'топ-топ';

    public function say()
    {
        return $this->voice;
    }

    public function walk()
    {
        return $this->steps;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setVoice($voice)
    {
        $this->voice = $voice;
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;
    }
}

class Cow extends Animal
{
    public $voice = 'му-му';
    public $name = 'Коровка';
}

class Pig extends Animal
{
    public $voice = 'хрю-хрю';
    public $name = 'Хрюшка';
}

class Chicken extends Animal
{
    public $voice = 'ко-ко';
    public $name = 'Курица';
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
        echo($animal->name . ' говорит ' . $animal->say() . ' и, затем, ' . $animal->walk() . ' на ферму <br />');
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
            echo($this->animals[$result[$i]]->name . ' с фермы кричит ' . $this->animals[$result[$i]]->say() . '<br />');
        } 
    }
}

$farm = new Farm();

$farm->addAnimal(new Cow());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Chicken());

$farm->rollCall();
