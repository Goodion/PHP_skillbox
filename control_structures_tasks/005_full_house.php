<pre>
<?php
// А теперь все вместе, массивы, операторы, циклы, условные конструкции. Почувствуйте себя программистом

// 1. Забастовка курьеров.
// Шел конец мая, на улице светило солнышко, никому не хотелось работать, а вот водички попить, никто не отказывается.
// Сегодня 13 число - понедельник. Мы работаем в курьерской службе доставки питьевой воды, и нам в доставку 100 заказов, на последующие 10 дней (с 14 по 24).
// Стоимость каждого заказа это случайное число от 100 до 5000 руб.
// И все бы ничего, мы предвкушаем прибыли, но... Всегда есть какое-то но. Наши курьеры устроили забастовку, говорят: "НЕ будем работать в выходные".
// Делать нечего, будем считать убытки.
// Создайте, пожалуйста, нам массив с данными по заказам orders, он нам очень нужен для отчетности.
// Для каждого заказа нам нужно знать сумму и дату его доставки. Какие товары в заказах, нам пока знать не надо, но потом может понадобится.

for ($i = 0; $i < 100;) {
    $orders[$i]['orderNumber'] = ++$i;
    $orders[$i]['orderSum'] = rand(100, 5000);
    $orders[$i]['orderDate']['date'] = rand(14, 24);
}

foreach ($orders as $key => $value) {
    switch ($value['orderDate']['date']) {
        case (14):
        case (21):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Вторник';
            break;
        case (15):
        case (22):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Среда';
            break;
        case (16):
        case (23):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Четверг';
            break;
        case (17):
        case (24):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Пятница';
            break;
        case (18):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Суббота';
            break;
        case (19):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Воскресенье';
            break;
        case (20):
            $orders[$key]['orderDate']['dayOfWeek'] = 'Понедельник';
            break;
    }
}

/* var_dump($orders); */

// Посчитайте нам, пожалуйста, сколько мы могли бы заработать
// а еще, посчитайте, сколько мы не доставим заказов из-за этих лодырей
// а еще, посчитайте, сколько мы потеряем денег

$profit = 0;
$lossOrdersInWeekends = 0;
$lossInWeekends = 0;
$ordersByWorkingDaysWithOrderSum = [];

foreach ($orders as $key => $value) {
    $profit = $profit + $value['orderSum'];
    if ($value['orderDate']['dayOfWeek'] == 'Суббота' || $value['orderDate']['dayOfWeek'] == 'Воскресенье') {
        ++$lossOrdersInWeekends;
        $lossInWeekends = $lossInWeekends + $value['orderSum'];
    } else {
        $currentDate = strval($value['orderDate']['date']);
        $currentSum = $value['orderSum'];
        if (!isset($ordersByWorkingDaysWithOrderSum[$currentDate])) {
            $ordersByWorkingDaysWithOrderSum += [
                $currentDate => [
                    $currentSum
                ],
            ];
        } else {
            array_push($ordersByWorkingDaysWithOrderSum[$currentDate], $currentSum);
        }
        
    }
}

// и покажите нам отчет, в виде строки "Заказов {} на сумму: {}. Из них профукано {} заказов на сумму: {}"

var_dump("Заказов " . count($orders) . " на сумму: $profit. Из них профукано $lossOrdersInWeekends заказов на сумму: $lossInWeekends");



// 2. Отчет для HR-ов
// Вы хорошо потрудились, а вот мы не очень. Курьеры у нас не только отказываются работать по выходным, так еще и не могут доставить более 1 заказа в день.
// А у нас работает всего только 3 курьера.
$couriersCount = 3;
// Выведите нам для начальства и HR строку: "Для того, чтобы доставить все заказы, минимальное количество курьеров: {}"
// Только учтите, что мы все еще не можем ничего доставлять в выходные

foreach ($orders as $key => $value) {
    $currentDate = $value['orderDate']['date'];
    if ($currentDate < 18 || $currentDate > 19) {
        ++$ordersByWorkingDay[$currentDate];
    }
}

$allordersByWorkingDay = $ordersByWorkingDay;
for ($i = 0; $i < $lossOrdersInWeekends; $i++) {
    $minOrderPerWorkingDay = array_search(min($allordersByWorkingDay),$allordersByWorkingDay);
    $allordersByWorkingDay[$minOrderPerWorkingDay] += 1;
}

$minCouriers = max($allordersByWorkingDay);

var_dump("Для того, чтобы доставить все заказы, минимальное количество курьеров: $minCouriers"); 


// 3. Отчет для начальства
// Спасибо вам большое, но досталось нам от начальства крепко. Курьеров, то мы еще наймем, но где ж их в мае сыщешь, так что это будет уже поздно.
// Начальство требует отчет, сколько мы профукаем еще, с учетом, что не можем добавить все, а клиенты у нас очень сердитые, и не хотят доставку в другой день.
// Выведите нам для начальства и строку: "Заказов профукано из-за недостатка курьеров: {}"

$lossOrdersBecauseFewCouriers = 0;

foreach ($ordersByWorkingDay as $key => $value) {
    if ($value >= $couriersCount) {
        $lossOrdersBecauseFewCouriers = $lossOrdersBecauseFewCouriers + $value - $couriersCount;
    }
}

var_dump("Заказов профукано из-за недостатка курьеров: $lossOrdersBecauseFewCouriers");



// 4. Спасаемся как можем
// Делать нечего, а еще начальство сказало: "если все заказы доставить не можем в какой-то день, то везите самые дорогие"
// Мы знаем, что вы еще не проходили функции для сортировки, но тут без них не обойтись

$lossOrdersBecauseFewCouriers = 0;
foreach ($ordersByWorkingDaysWithOrderSum as $key => $value) {
    sort($value);
    if (count($value) > $couriersCount) {
        for ($i = 0; $i < count($value) - $couriersCount; $i++) {
            ++$lossOrdersBecauseFewCouriers;
            $lossBecauseFewCouriers += $value[$i];
        }
    } 
}

var_dump("Заказов профукано из-за недостатка курьеров $lossOrdersBecauseFewCouriers на сумму: $lossBecauseFewCouriers");
// Выведите нам для начальства и строку: "Заказов профукано из-за недостатка курьеров {} на сумму: {}"

// 5. Итоговый отчет
// Меня, конечно, уволят, но вы, выведите пожалуйста итоговый отчет:
// "Заказов {} на сумму: {}. Из них профукано в выходные {} заказов на сумму: {}. А также профукано из-за недостатка курьеров {} на сумму: {}"
// "Итого заказов доставлено {} из {}, денег заработано {} из {}"

$ordersDelivered = count($orders) - $lossOrdersInWeekends - $lossOrdersBecauseFewCouriers;
$cashGathered = $profit - $lossInWeekends - $lossBecauseFewCouriers;

var_dump("Заказов " . count($orders) . " на сумму: $profit. Из них профукано в выходные $lossOrdersInWeekends заказов на сумму: $lossInWeekends. 
    А также профукано из-за недостатка курьеров $lossOrdersBecauseFewCouriers на сумму: $lossBecauseFewCouriers");
var_dump("Итого заказов доставлено $ordersDelivered из " . count($orders) . " , денег заработано $cashGathered из $profit");

?>
</pre>
