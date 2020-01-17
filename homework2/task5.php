<?php

$city1 = 20;
$city1Radius = 10;
$city2 = 40;
$city2Radius = 5;
$city1Start = $city1 - $city1Radius;
$city1End = $city1 + $city1Radius;
$city2Start = $city2 - $city2Radius;
$city2End = $city2 + $city2Radius;

for ($i = 1; $i <= 10; $i++) {
    $cars[$i] = rand(1, 50);
}

foreach ($cars as $car => $coordinates) {
    if ((($coordinates >= $city1Start) && ($coordinates <= $city1End)) || (($coordinates >= $city2Start) && ($coordinates <= $city2End))) {
        $carSpeed = 70;
        $location = 'городу';
    } else {
        $carSpeed = 90;
        $location = 'шоссе';
    }
    echo("Машина $car едет по $location на $coordinates км со скоростью $carSpeed");
}
