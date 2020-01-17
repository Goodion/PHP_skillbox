<?php

$mainMenu = [
    [
        'title' => 'Мои сообщения',
        'path' => '/posts/',
        'sort' => 2,
        'visible' => 0,
        'body' => '/posts/posts.php',
    ],
    [
        'title' => 'Профиль',
        'path' => '/route/profile/',
        'sort' => 1,
        'visible' => 0,
        'body' => '/templates/profile.php',
    ],
    [
        'title' => 'Отправить сообщение',
        'path' => '/posts/add/',
        'sort' => 3,
        'visible' => 0,
        'body' => '/posts/add_post.php',
    ],
    [
        'title' => 'Главная',
        'path' => '/',
        'sort' => 0,
        'visible' => 1,
        'body' => '/',
    ],
    [
        'title' => 'Сообщение',
        'path' => '/posts/message_read.php',
        'sort' => 4,
        'visible' => 0,
        'body' => '/posts/message_read.php',
    ],
];
