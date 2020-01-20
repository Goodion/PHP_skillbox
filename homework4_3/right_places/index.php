<?php

class Manager
{
    public function place($item)
    {
        $class = get_parent_class($item);

        switch ($class) {
            case 'Papers':
                echo 'Положил ' . $class . ' на стол' . PHP_EOL;
                break;
            
            case 'Instrument':
                echo 'Убрал ' . $class . ' внутрь стола' . PHP_EOL;
                break;

            default:
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
