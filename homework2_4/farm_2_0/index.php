<?php

namespace homework2_4\farm_2_0;

abstract class Animal
{
    abstract public function say();
    abstract public function walk();
}

abstract class Bird extends Animal
{
    public $animalType = 'птица';

    abstract public function setSteps($steps);
    abstract public function tryToFly();
}

class Chicken extends Bird
{
    public $animalType = 'птица';
    public $voice = 'ко-ко';
    public $name = 'Курица';

    public function say()
    {
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;
    }

    public function walk()
    {
        $this->setSteps('пытается полететь - вжих-вжих-топ-топ');
        echo('<br />');
        echo($this->name . ' ' . $this->tryToFly());
        echo('<br />');
    }

    public function tryToFly()
    {
        return $this->steps;
    }
}

class Goose extends Bird
{
    public $animalType = 'птица';
    public $voice = 'кря-кря';
    public $name = 'Гусь';

    public function say()
    {   
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;
    }

    public function walk()
    {
        $this->setSteps('пытается полететь - вжих-вжих-топ-топ');
        echo('<br />');
        echo($this->name . ' ' . $this->tryToFly());
        echo('<br />');
    }

    public function tryToFly()
    {
        return $this->steps;
    }
}

class Turkey extends Bird
{
    public $animalType = 'птица';
    public $voice = 'кулдык-кулдык';
    public $name = 'Индюк';

    public function say()
    {   
        echo('<br />');
        echo($this->name . ' говорит ' . $this->voice);
        echo('<br />');
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;
    }

    public function walk()
    {
        $this->setSteps('пытается полететь - вжих-вжих-топ-топ');
        echo('<br />');
        echo($this->name . ' ' . $this->tryToFly());
        echo('<br />');
    }

    public function tryToFly()
    {
        return $this->steps;
    }
}

abstract class Hoofed extends Animal
{
    public $animalType = 'копытное';
}

class Cow extends Hoofed
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

class Pig extends Hoofed
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

class Horse extends Hoofed
{
    public $steps = 'топ-топ';
    public $voice = 'иго-го';
    public $name = 'Лошадь';

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
    public $farmType;

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

        for ($i = 0; $i < $count; $i++) {
            $this->randomizerCheckUnique($result, $count);
            $this->animals[$result[$i]]->say();
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
        $animal->walk();
        $this->animals[] = $animal;
        $this->showAnimalsCount();
    }

    function showAnimalsCount()
    {
        echo('<br />');
        echo('На ферме ' . $this->getFarmType() . ' сейчас находится птиц - ' . count($this->animals) . '.<br />');
        echo('<br />');
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
