<?php

// 1. Создайте переменную isGood со значением true и создайте переменную smallNumber со значением от 1 до 5
// Предположите какой тип данных и значение будет, если сложить эти переменные
// А теперь сложите их и посмотрите на результат
// # Вроде ничего и не подскажешь уже


// 2. В следующем коде есть ошибка: раскомментируйте код и исправьте ее исправьте ее
/**
$firstDay = 'Понедельник';
$secondDay = 'Вторник';
$3Day = 'Среда';

var_dump($firstDay . ' ' . $secondDay . ' ' . $3Day);
*/
// # Момент видео 24:14

// 3. Создайте переменную $catsCount, в качестве значения укажите любое целое число
// И исправьте ошибку в коде ниже. На странице должно быть выведено сообщение: "Во дворе котов: 3"
// # Момент видео 18:50, есть разница в одинарных и двойных кавычках

var_dump('Во дворе котов: $catsCount');


// 4. Создайте переменную $currentDate, поместите в нее в виде строки текущую дату в формате ГГГГ-ММ-ДД, например 1971-12-31
// Выведите 1-ю строку: "Шла зима, на двор стоял 1971-12-31 число, скорей бы лето", вместо даты нужно подставить значение переменной
// Выведите 2-ю строку: "Шла зима, на двор стоял $currentDate число, скорей бы лето"
// # Для подстановки данных из переменной в строку нужно использовать двойные кавычки.
// # Значения в строках в одинарных кавычках не преобразуются, а выводятся как есть


// 5. Исправьте названия переменных, так чтобы было понятно, что это за переменные
// # названия переменных совершенно не говорят о том, для чего они предназначены, а где-то даже сбивают с толку
$a = 'Мурзик';
$j = 4;
$two = 2;
$weight = 27;
$size = 'черного';
$_i_dont_know_how_to_name_it_ = 'белого';
$BABABABABABA = 'черного';
$vsem_privet = 'тазик';
$tmp = 'с мазутом';

var_dump("Жил был кот по имени $a");
var_dump("У него было $j лапы, $two уха и хвост длинной $weight см");
var_dump("Сам он был $size цвета, но лапки были $_i_dont_know_how_to_name_it_ цвета");
var_dump("Однажды он пошел гулять и упал в $vsem_privet $tmp");
var_dump("Теперь и лапы нашего кота тоже $BABABABABABA цвета");

// При создании этого задания ни один котик не пострадал!