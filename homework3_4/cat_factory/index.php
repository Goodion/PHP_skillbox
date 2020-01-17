<?php

namespace catFactory;

class Cat
{
    public $name;
    public $color;
    public $age;

    public function __construct($name, $color = '', $age = '')
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
}

class CatFactory
{
    public static function createBlack8YearsOldCat($name)
    {
        return new Cat($name, "black", 8);
    }

    public static function createWhite2YearsOldCat($name)
    {
        return new Cat($name, "white", 2);
    }

    public static function createBlackCat($name)
    {
        return new Cat($name, "black");
    }

    public static function createWhiteCat($name)
    {
        return new Cat($name, "white");
    }

    public static function create8YearsOldCat($name)
    {
        return new Cat($name, '', 8);
    }

    public static function create2YearsOldCat($name)
    {
        return new Cat($name, '', 2);
    }

    public static function createCat($name)
    {
        return new Cat($name);
    }
}

$cats[] = [
    CatFactory::createBlack8YearsOldCat('кот1'),
    CatFactory::createWhite2YearsOldCat('кот2'),
    CatFactory::createBlackCat('кот3'),
    CatFactory::createWhiteCat('кот4'),
    CatFactory::create8YearsOldCat('кот5'),
    CatFactory::create2YearsOldCat('кот6'),
    CatFactory::createCat('кот7')
];

echo('<pre>');
print_r($cats);
echo('</pre>');
