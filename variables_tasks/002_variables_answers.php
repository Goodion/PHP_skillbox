<?php

// 1. Создайте переменную isGood со значением true и создайте переменную smallNumber со значением от 1 до 5
// Предположите какой тип данных и значение будет, если сложить эти переменные
// А теперь сложите их и посмотрите на результат
// # Вроде ничего и не подскажешь уже
$isGood = true;
$smallNumber = 3;
var_dump($isGood + $smallNumber);

// 2. В следующем коде есть ошибка: раскомментируйте код и исправьте ее исправьте ее
$firstDay = 'Понедельник';
$secondDay = 'Вторник';
$Day = 'Среда';

var_dump($firstDay . ' ' . $secondDay . ' ' . $Day);
// # Момент видео 24:14

// 3. Создайте переменную $catsCount, в качестве значения укажите любое целое число
// И исправьте ошибку в коде ниже. На странице должно быть выведено сообщение: "Во дворе котов: 3"
// # Момент видео 18:50, есть разница в одинарных и двойных кавычках
$catsCount = 3;
var_dump('Во дворе котов: $catsCount');

// 4. Создайте переменную $currentDate, поместите в нее в виде строки текущую дату в формате ГГГГ-ММ-ДД, например 1971-12-31
// Выведите 1-ю строку: "Шла зима, на двор стоял 1971-12-31 число, скорей бы лето", вместо даты нужно подставить значение переменной
// Выведите 2-ю строку: "Шла зима, на двор стоял $currentDate число, скорей бы лето"
// # Для подстановки данных из переменной в строку нужно использовать двойные кавычки.
// # Значения в строках в одинарных кавычках не преобразуются, а выводятся как есть
$currentDate = '2019-01-02';
// $currentDate = date('Y-m-d'); или более продвинутый вариант
var_dump("Шла зима, на двор стоял $currentDate число, скорей бы лето");
var_dump('Шла зима, на двор стоял $currentDate число, скорей бы лето');

// 5. Исправьте названия переменных, так чтобы было понятно, что это за переменные
// # названия переменных совершенно не говорят о том, для чего они предназначены, а где-то даже сбивают с толку

// это лишь один из вариантов правильного ответа

$catName = 'Мурзик';
$catLegsCount = 4;
$catEarsCount = 2;
$carTailLength = 27;
$catColor = 'черного';
$carLegsColorBefore = 'белого';
$carLegsColorAfter = 'черного';
$containerName = 'тазик';
$containerContent = 'с мазутом';

var_dump("Жил был кот по имени $catName");
var_dump("У него было $catLegsCount лапы, $catEarsCount уха и хвост длинной $carTailLength см");
var_dump("Сам он был $catColor цвета, но лапки были $carLegsColorBefore цвета");
var_dump("Однажды он пошел гулять и упал в $containerName $containerContent");
var_dump("Теперь и лапы нашего кота тоже $carLegsColorAfter цвета");

// При создании этого задания ни один котик не пострадал!