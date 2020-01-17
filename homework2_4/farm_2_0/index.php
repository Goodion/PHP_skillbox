<?php

namespace homework2_4\farm_2_0;

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

    public function setAnimalType($animalType)
    {
        $this->animalType = $animalType;
    }
}

class Bird extends Animal
{
    public $animalType = 'птица';

    public function walk()
    {
        $this->setSteps('пытается полететь - вжих-вжих-топ-топ');
        return $this->tryToFly();
    }

    public function tryToFly()
    {
        return $this->steps;
    }
}

class Chicken extends Bird
{
    public $voice = 'ко-ко';
    public $name = 'Курица';
}

class Goose extends Bird
{
    public $voice = 'кря-кря';
    public $name = 'Гусь';
}

class Turkey extends Bird
{
    public $voice = 'кулдык-кулдык';
    public $name = 'Индюк';
}

class Hoofed extends Animal
{
    public $animalType = 'копытное';
}

class Cow extends Hoofed
{
    public $voice = 'му-му';
    public $name = 'Коровка';
}

class Pig extends Hoofed
{
    public $voice = 'хрю-хрю';
    public $name = 'Хрюшка';
}

class Horse extends Hoofed
{
    public $voice = 'иго-го';
    public $name = 'Лошадь';
}

class Farm
{
    public $animals;
    public $farmType;

    public function __construct()
    {
        $this->animals = [];
    }
    
    public function addAnimal(Animal $animal)
    {
        echo($animal->name . ' говорит ' . $animal->say() . ' и, затем, ' . $animal->walk() . ' на ферму ' . $this->getFarmType() . ' <br />');
        $this->animals[] = $animal;
    }

    public function rollCall()
    {
        $tmp = null;
        $count = count($this->animals);
        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $this->randomizerCheckUnique($result, $count);
            echo($this->animals[$result[$i]]->name . ' с фермы ' . $this->getFarmType() . ' кричит ' . $this->animals[$result[$i]]->say() . '<br />');
        } 
    }

    protected function randomizerCheckUnique(&$result, $count)
    {
        $tmp = mt_rand(0, $count - 1);
        if (array_search($tmp, $result) !== false) {
            $this->randomizerCheckUnique($result, $count);
        } else {
            $result[] += $tmp;
            return $result;
        }
    }

    public function setFarmType($farmType)
    {
        $this->farmType = $farmType;
    }

    public function getFarmType()
    {
        return $this->farmType;
    }
}

class HoofedFarm extends Farm
{
    public $farmType = 'для копытных';
}

class BirdFarm extends Farm
{
    public $farmType = 'для птиц';

    public function addAnimal(Animal $animal)
    {
        echo($animal->name . ' говорит ' . $animal->say() . ' и, затем, ' . $animal->walk() . ' на ферму ' . $this->getFarmType() . ' <br />');
        $this->animals[] = $animal;
        echo('На ферме ' . $this->getFarmType() . ' сейчас находится птиц - ' . $this->showAnimalsCount() . '.<br />');
    }

    function showAnimalsCount()
    {
        return count($this->animals);
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal)
    {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm)
    {
        $farm->rollCall();
    }
}

$hoofedFarm = new HoofedFarm();
$birdFarm = new BirdFarm();
$farmer = new Farmer();

$farmer->addAnimal($hoofedFarm, new Cow());
$farmer->addAnimal($hoofedFarm, new Pig());
$farmer->addAnimal($hoofedFarm, new Pig());
$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($hoofedFarm, new Horse());
$farmer->addAnimal($hoofedFarm, new Horse());
$farmer->addAnimal($birdFarm, new Goose());

$farmer->rollCall($hoofedFarm);
$farmer->rollCall($birdFarm);
