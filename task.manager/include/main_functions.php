<?php

/**
 * Функция возвращает вывод меню
 * @param array $mainMenu массив с элементами меню
 * @param string $sort порядок сортировки
 * @param string $divClass класс для DIV
 * @param string $ulClass класс для UL
 */
function showMenu($mainMenu, $sort = 'asc', $divClass = 'clear', $ulClass = 'main-menu') 
{
    $menuForAuthenticated = checkPermissionsMainMenu($mainMenu);

    $menuSorted = sortMenu($menuForAuthenticated, $sort);
    
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
 * Функция возвращает тело текущей страницы
 * @param array $mainMenu массив с элементами меню
 */
function showBody($mainMenu) 
{
    foreach ($mainMenu as $menuItem) {
        
        if (isCurrentUrl($menuItem['path'])) {
            $currPageBody = $menuItem['body'];
            break;
        }
    } 
    
    if (! isset($currPageBody)) {
        $currPageBody = 'Внимание! Данная страница не найдена.';
        exit;
    }

    include $_SERVER['DOCUMENT_ROOT'] . $currPageBody; 

    return $currPageBody;
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

/**
 * Функция возвращает массив с меню для авторизованных пользователей
 * @param array $mainMenu массив с элементами меню
*/
function checkPermissionsMainMenu($mainMenu)
{
    $menuWithPermissions = $mainMenu;

    foreach ($mainMenu as $key=>$menuItem) {
        
        if (checkRegistered()) {
            if ($menuItem['title'] === 'Профиль' || $menuItem['title'] === 'Мои сообщения') {
                $menuWithPermissions[$key]['visible'] = 1;
            }
            
        } 
        
        if (checkApproved()) {
            if ($menuItem['title'] === 'Профиль' || $menuItem['title'] === 'Отправить сообщение' || $menuItem['title'] === 'Мои сообщения') {
                $menuWithPermissions[$key]['visible'] = 1; 
            }
        }
    }
    
    foreach ($menuWithPermissions as $menuItem) {
        if ($menuItem['visible']) {
            $menuVisible[] = $menuItem;
        }
    }

    return $menuVisible;
}

function checkRegistered()
{
    if (isset($_SESSION['isRegistered']) && $_SESSION['isRegistered'] === true) {
        return true;
    }
}

function checkApproved()
{
    if (isset($_SESSION['isApproved']) && $_SESSION['isApproved'] === true) {
        return true;        
    }
}

function checkGroupsPermissions()
{
    $stmt = connect()->prepare(
        'SELECT g.caption, g.description FROM group_user AS gu 
            LEFT JOIN users AS u ON gu.user_id = u.id
            LEFT JOIN `groups` AS g ON g.id = gu.group_id
        WHERE email = ?'
    );
    $stmt->execute(array($_SESSION['login']));
    $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $groups; 
}

function getUserId()
{
    $stmt = connect()->prepare(
        'SELECT id FROM users WHERE email = ?'
    );
    $stmt->execute(array($_SESSION['login']));
    $userId = $stmt->fetchColumn();

    return $userId; 
}

function generateElemTree(&$treeElem, $parents_arr) 
{
    foreach($treeElem as $key=>$item) {
        if (! isset($item['children'])) {
            $treeElem[$key]['children'] = array();
        }
        if (array_key_exists($key, $parents_arr)) {
            $treeElem[$key]['children'] = $parents_arr[$key];
            generateElemTree($treeElem[$key]['children'], $parents_arr);
        }
    }
}

function createTree($arr) 
{
    $parents_arr = array();
    foreach ($arr as $key=>$item) {
        if ($item['parent_id'] === null) {
            $item['parent_id'] = 0;
        } 
        $parents_arr[$item['parent_id']][$item['section_id']] = $item;
    }
    $treeElem = $parents_arr[0];
    generateElemTree($treeElem, $parents_arr);
    
    return $treeElem;
}

function renderTemplate($arr, $arr2) 
{
    $output = '';
    $path = $_SERVER['DOCUMENT_ROOT'] . '/include/sections_part.php';
    if (file_exists($path)) {
        extract($arr);
        extract($arr2);
        ob_start();
        include $path;
        $output = ob_get_clean();
    }
    return $output;
}

function checkMessageReadPermission($message_id)
{
    $stmt = connect()->prepare(
        'SELECT receiver_id FROM messages WHERE id = ?'
    );
    $stmt->execute(array($message_id));
    $verifiableUserId = $stmt->fetchColumn();

    $isVerified = $_SESSION['userId'] === $verifiableUserId;

    return $isVerified;
}

function getSections($userId)
{
    $stmt = connect()->prepare(
        'SELECT s.id AS section_id,
            s.parent_id AS parent_id,
            s.caption AS section_caption,
            c.color AS section_color,
            c.id AS color_id
                FROM sections AS s
                    LEFT JOIN colors AS c ON s.color_id = c.id
        WHERE s.created_by = ?'
    );
        
    $stmt->execute(array($userId));
    $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $sections;
}

function getMessages($userLogin)
{
    $stmt = connect()->prepare(
        'SELECT m.id AS message_id, 
            m.caption AS message_caption, 
            s.caption AS section_caption,
            m.is_read, 
            s.id AS section_id,
            u.id AS user_id
                FROM messages AS m 
                    LEFT JOIN users AS u ON m.receiver_id = u.id
                    LEFT JOIN sections AS s ON s.id = m.section_id
    WHERE email = ?'
    );
        
    $stmt->execute(array($userLogin));
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $messages;
}

function addSection($section, $userId, $color, $parent)
{
    connect()->beginTransaction();
    $stmt = connect()->prepare("INSERT INTO sections (caption, created_by, color_id, parent_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$section, $userId, $color, null]);
    
    $sectionId = connect()->lastInsertId();
                                    
    connect()->commit();
}

function addMessage($text, $caption, $sectionId, $sender_id, $userId) 
{
    $stmt = connect()->prepare("INSERT INTO messages (text, caption, section_id, sender_id, receiver_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$text, $caption, $sectionId, $sender_id, $userId]);
}

function getApprovedUsers()
{
    $sql = connect()->query(
        'SELECT u.id AS user_id,
            u.name AS user_name
                FROM group_user AS gu
                    LEFT JOIN users AS u ON u.id = gu.user_id  
        WHERE group_id = 2');
    
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function setMessageRead($message_id)
{
    $stmt = connect()->prepare(
        'UPDATE messages SET is_read = 1 WHERE id = ?'
    );
    $stmt->execute(array($message_id));
}

function getMessageContent($message_id)
{
    $stmt = connect()->prepare(
        'SELECT m.caption AS m_caption,
                m.text AS m_text,
                m.created_at AS m_creation_date,
                u.name AS m_sender_name,
                u.email AS m_sender_email
                    FROM messages AS m
                        LEFT JOIN users AS u ON u.id = m.sender_id
        WHERE m.id = ?'
    );
    $stmt->execute(array($message_id));
    $message = $stmt->fetch(PDO::FETCH_ASSOC);

    return $message;
}

function getPasswordForUserLogin($login)
{
    $stmt = connect()->prepare('SELECT password FROM users WHERE email = ?');
    $stmt->execute([$login]);
    $password = $stmt->fetchColumn();
    
    return $password;
}
