<?php

namespace online_shop;

include $_SERVER['DOCUMENT_ROOT'] . '/homework2_1_7/client_notice/index.php';

class Order
{
    public $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }
    
    public function getBasket()
    {
        return $this->basket->describe();
    }

    public function getPrice()
    {
        return $this->basket->getPrice();
    }
}

class Basket
{
    public $overallPrice = 0;
    public $basket;
    
    public function __construct()
    {
        $this->basket = [];
    }

    public function addProduct(Product $product, $quantity)
    {
        $this->basket[] = [
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'quantity' => $quantity,
            ];
        
        return $this->basket;
    }

    public function getPrice()
    {
        $this->overallPrice = 0;
        foreach ($this->basket as $key) {
            $this->overallPrice += $key['price'] * $key['quantity']; 
        }
        return $this->overallPrice;
    }

    public function describe()
    {
        foreach ($this->basket as $key) {
            echo $key['name'] . ' - ' . $key['price'] . 'руб. - ' . $key['quantity'] . 'шт <br />'; 
        }
    }
}

class Product
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$pr = new Product('Hleb', 500);
$pr2 = new Product('Voda', 100);
$pr3 = new Product('kolbasa', 700);
$pr4 = new Product('makarony', 1000);

$basket = new Basket;
$basket->addProduct($pr, 3);
$basket->addProduct($pr2, 5);
$basket->addProduct($pr3, 2);
$basket->addProduct($pr4, 1);

$order = new Order($basket);

echo '<pre>';
print_r($order->getBasket());
echo '</pre>';
echo 'Итого: ' . $order->getPrice();
echo '<br />';

$user = new \client_notice\User('Николай Николаич', 'niknik@mail.ru', 'male', '25');

$user->notify('Для вас создан заказ, на сумму: ' . $order->getPrice() . ' руб. Состав:<br />');
$order->getBasket();
