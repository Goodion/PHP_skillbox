<pre>
<?php

// 1. Выведите числа от 0 до 9

for($i = 0; $i < 10; $i++) 
{
    var_dump($i);
}

// 2. Выведите 10 случайных числе от 1 до 10

for($i = 0; $i < 10; $i++) 
{
    var_dump(rand(1, 10));
}

// 3. Создайте массив items из 10 случайных целых значений от 0 до 9

for($i = 0; $i < 10; $i++) 
{
    $items[$i] = rand(0, 9);
}
var_dump($items);

// 4. Добавляйте случайные целые числа от 1 до 9 в массив numbers до тех пор, пока сумма всех элементов этого массива меньше 100
// А затем выведите сколько числе всего в массиве: "Длинна массива numbers = {}"

for ( ; ; ) {
    $i = rand(1, 9);
    if (($sum + $i) >= 100) break;
    $sum += $i;
    $numbers[] = $i;
}

var_dump($sum);
var_dump("Длина массива numbers = " . count($numbers));
var_dump(array_sum($numbers));

// 5. Переберите массив $numbers, созданный ранее, и посчитайте сумму всех четных чисел в нем
// Выведите следующие строки (как всегда вместо {} подставив нужные значения):
// Общая сумма массива numbers = {}
// Из нее часть, которая приходится на четные числа = {}
// И часть из нечетных чисел = {}

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 == 0) $evenSum += $numbers[$i]; 
}

$overallSum = array_sum($numbers);

var_dump($numbers);
var_dump("Общая сумма массива numbers = $overallSum");
var_dump("Из нее часть, которая приходится на четные числа = $evenSum");
var_dump("И часть из нечетных чисел = " . ($overallSum - $evenSum));

?>
</pre>
