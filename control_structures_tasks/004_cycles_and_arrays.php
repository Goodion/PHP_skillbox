<pre>
<?php

// Циклы для данных в массивах

// 1. Создайте массив boringToys скучных игрушек и случайного количества элементов от 1 до 10, где каждый элемент этого массива это ассоциативный массив с двумя полями:
// - Название игрушки: в виде "Игрушка 1"
// - Цена игрушки: случайное число от 100 до 1000

$toysQuantity = rand(1, 10);

for ($i = 0; $i < $toysQuantity; $i++) {
    $boringToys["Игрушка " . ($i + 1)] = rand(100, 1000);
}

/* var_dump($boringToys); */

// 2. Создайте массив cars из трех машин: Мерседес - 10000 руб, BMW - 9999 руб, Автобус - 20000 руб.
// Объем данных о машинах будет увеличиваться, поэтому создайте ассоциативный массив с данными о машинах

$cars = [
    'mercedes' => [
        'type' => 'Мерседес',
        'price' => 10000
    ],
    'BMW' => [
        'type' => 'БМВ',
        'price' => 9999
    ],
    'bus' => [
        'type' => 'Автобус',
        'price' => 20000
    ]
];

// 3. Посчитайте стоимость и выведите общую стоимость всех машин, и выведите ее

foreach ($cars as $value) {
    $totalSum += $value['price'];
}

/* var_dump($totalSum); */

// 4. Для каждой машины добавьте поле colors - возможные варианты цветов при этом для каждого цвета, есть своя надбавка к стоимости (разная для разных машин)
// Создайте массив colors с цветами для каждой машины и добавьте по три случайных цвета каждой машине для каждого цвета укажите надбавку - случайное число от 0 до 100
// Выведите этот массив и убедитесь в его правильности.

$colors = [
    'mercedes' => [
        'red' => rand(0, 100),
        'black' => rand(0, 100),
        'white' => rand(0, 100)
    ],
    'BMW' => [
        'blue' => rand(0, 100),
        'yellow' => rand(0, 100),
        'gray' => rand(0, 100)    
    ],
    'bus' => [
        'opal' => rand(0, 100),
        'green' => rand(0, 100),
        'orange' => rand(0, 100)    
    ]
];

foreach ($cars as $key => $value) {
    $cars[$key]['color'] = $colors[$key];
}

/* var_dump($cars); */

// 5. Каталог автомобилей.
// А теперь выведите весь каталог автомобилей в виде: "Автомобиль {} цвета {} всего за: {} руб", вместо {} поставьте соответственно: название автомобиля, цвет, стоимость в этом цвете

foreach ($cars as $key => $value) {
    foreach ($value['color'] as $color => $value1) {
        var_dump("Автомобиль " . $value["type"] . " цвета " . $color ." всего за: " . ($value['price'] + $value1) . " руб"); 
    } 
}

?>
</pre>