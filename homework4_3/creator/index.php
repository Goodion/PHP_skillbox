<?php

abstract class Item
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function show()
    {
        echo('<br />');
        echo('Я ' . $this->name . PHP_EOL);
        echo('<br />');
    }
}

class EmptyItem extends Item
{
    public function show()
    {
        echo('<br />');
        echo('Класс ' . $this->name . ' не найден' . PHP_EOL);
        echo('<br />');
    }
}

class Creator
{
    public static function create($name)
    {
        if (class_exists($name)) {
            return new $name($name);
        } else {
            return new EmptyItem($name);
        }
    }
}

class Book extends Item{};
class Cat extends Item{};
class Bird extends Item{};
class House extends Item{};
class Table extends Item{};
class Pen extends Item{};
class Nose extends Item{};
class Box extends Item{};
class Robot extends Item{};

$creator = new Creator;
$arr = ['Book', 'asdqv', 'Nose', 'Cat', 'Idwqsw', 'dsqq', 'Rasdf', 'House', 'Dqweq', 'Pen', 'Robot', 'Table'];

foreach ($arr as $item) {
    $newObj = $creator::create($item);
    $newObj->show();
}
