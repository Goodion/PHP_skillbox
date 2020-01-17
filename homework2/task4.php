<!doctype html>
<html lang="en">
<?php

$result3 = [
    'authors' => [
        'zandstra@gmail.com' => [
            'fullName' => 'Мэтт Зандстра',
            'yearOfBirth' => 'неизвестно',
        ],
        'velling@gmail.com' => [
            'fullName' => 'Веллинг Люк',
            'yearOfBirth' => '1972',
        ],
        'dronov@gmail.com' => [
            'fullName' => 'Дронов Владимир Александрович',
            'yearOfBirth' => '1971',
        ],
        'sklyar@gmail.com' => [
            'fullName' => 'Скляр Дэвид',
            'yearOfBirth' => 'неизвестно',
        ],
    ],
    'books' => [
        [
            'title' => 'Мэтт Зандстра: PHP: объекты, шаблоны и методики программирования',
            'email' => 'zandstra@gmail.com',
        ],
        [
            'title' => 'PHP and MySQL Web Development',
            'email' => 'velling@gmail.com',
        ],
        [
            'title' => 'Дронов, Прохоренок: HTML, JavaScript, PHP и MySQL. Джентльм.наб.',
            'email' => 'dronov@gmail.com',
        ],
        [
            'title' => 'Learning PHP 7',
            'email' => 'sklyar@gmail.com',
        ],
    ],
];

$overallAuthors = count($result3['authors']);
$title = 'Это заголовок страницы';
$red = (bool) rand(0, 1);

?>

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style type="text/css">.red {color: red;}</style>
</head>
<body>
<h1 <?= $red ? 'class="red"' : ''; ?>><?= $title; ?></h1>
<div>Авторов на портале: <?= $overallAuthors; ?></div>
<!-- Выведите все книги -->
<?php 
foreach ($result3['books'] as $books => $book) {
   echo("<p>Книга " . $book['title'] . ", ее написал " . $result3['authors'][$book['email']]['fullName'] . " " . $result3['authors'][$book['email']]['yearOfBirth'] . " года рождения (" . $book['email'] . ")</p>");
}
?>

</body>
</html>
