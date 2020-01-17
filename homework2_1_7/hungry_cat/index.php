<?php

namespace hungry_cat;

class HungryCat
{
    protected $name;
    protected $color;
    protected $favouriteFood = 'рыба';
    
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favouriteFood;
    }

    public function setFavouriteFood($favouriteFood)
    {
        $this->favouriteFood = $favouriteFood;
    }

    public function getFavouriteFood()
    {
        return $this->favouriteFood;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function eat($food)
    {
        $this->result = '';
        if ($food === $this->getFavouriteFood()) {
            $this->result = "и замурчал 'мррррр' от своей любимой еды";
        }

        echo('Голодный кот ' . $this->getName() . ', особые приметы: цвет - ' . $this->getColor() . ', съел ' . $food . ' ' . $this->result . '<br />');
    }
}

$goodCat = new HungryCat('Мурзик', 'белый');
$badCat = new HungryCat('Кучка', 'синий');
$badCat->setFavouriteFood('кролик');

$goodCat->eat('рыба');
$goodCat->eat('мясо');
$goodCat->eat('кролик');
$goodCat->eat('конь');
$goodCat->eat('икра');

$badCat->eat('рыба');
$badCat->eat('мясо');
$badCat->eat('кролик');
$badCat->eat('конь');
$badCat->eat('икра');
