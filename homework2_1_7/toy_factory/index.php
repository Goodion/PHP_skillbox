<?php

namespace toy_factory;

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 6) {
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

class ToyFactory
{
    public static function createToy($name)
    {
        return new Toy($name);
    }
}

class Toy
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->setPrice();
    }

    public function setPrice()
    {
        $this->price = rand(100, 1000);
    }
}

$sum = 0;

for ($i = 0; $i <= rand(5, 20); $i++) {
    $currentToy = ToyFactory::createToy(generate_string($permitted_chars));
    echo $currentToy->name . '-' . $currentToy->price . '<br />'; 

    $sum += $currentToy->price;
}

echo 'Итого - ' . $sum;
