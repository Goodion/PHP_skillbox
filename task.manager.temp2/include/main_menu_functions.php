<?php

/**
 * Функция возвращает вывод меню
 * @param array $mainMenu массив с элементами меню
 * @param string $location расположение меню (header(по умолчанию), footer)
 */
function showMenu($mainMenu, $sort = 'asc', $divClass = 'clear', $ulClass = 'main-menu') 
{
    $menuSorted = sortMenu($mainMenu, $sort);
    
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
}

/**
 * Функция возвращает заголовок текущей страницы
 * @param array $mainMenu массив с элементами меню
 */
function showCaption($mainMenu) 
{
    foreach ($mainMenu as $menuItem) {
        
        if (isCurrentUrl($menuItem['path'])) {
            $currPageCaption = $menuItem['title'];
            break;
        }
    } 
    
    if (! isset($currPageCaption)) {
        $currPageCaption = 'Внимание! Данная страница не найдена.';
    }

    return $currPageCaption; 
}

/**
 * Функция парсит и возвращает путь до текущей страницы
 */
function isCurrentUrl($url) 
{
    return $url == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

/**
 * Если строка длиннее или равна $length символов, функция обрезает строку до $length - 3 символа, добавлят в конце три точки и возвращает полученую строку
 * @param string $str обрабатываемая строка
 * @param int $length длина строки, выше которой, она обрезается
 */
function trimStr($str, $length = 15) 
{
    if (mb_strlen($str, 'UTF-8') >= $length) {
        $str = mb_substr($str, 0, $length - 3) . '...';
    }

    return $str;
}

function sortMenu($arr, $sort)
{
    usort($arr, function ($a, $b) use ($sort)
        {
            $arr = $sort == 'desc' ? $b['sort'] - $a['sort'] : $a['sort'] - $b['sort'];
            return $arr;
        });
        
    return $arr;
}
