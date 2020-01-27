<?php

class Manager
{
    public function place($item)
    {
        if ($item instanceof Papers) {
            echo 'Положил ' . get_class($item) . ' на стол' . PHP_EOL;
        } else if ($item instanceof Instrument) {
            echo 'Убрал ' . get_class($item) . ' внутрь стола' . PHP_EOL;
        } else if (is_object($item)) {
            echo 'Выкинул ' . get_class($item) . ' в корзину' . PHP_EOL;
        } else {
            echo 'Выкинул ' . $item . ' в корзину' . PHP_EOL;
        }
    }
}

abstract class Papers{}
abstract class Instrument{}
class Letter extends Papers{}
class Document extends Papers{}
class File extends Papers{}
class Saw extends Instrument{}
class Screwdriver extends Instrument{}

$manager = new Manager;

$manager->place(new Letter);
$manager->place(new Document);
$manager->place(new File);
$manager->place(new Saw);
$manager->place(new Screwdriver);

$manager->place('объект');
$manager->place('');
