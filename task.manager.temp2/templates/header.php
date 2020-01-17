<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/phpconfig.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu_functions.php';

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$isAuthenticated = null;

if (isset($_COOKIE['session_id'])) {
    session_start();
    setcookie(session_name(), session_id(), time() + 60 * 20, '/');
}

if (isset($_COOKIE['currentUser'])) {
    setcookie('currentUser', $_SESSION['login'], time() + 60 * 60 * 24 * 30, '/');
}

if (isset($_GET['logout']) && $_GET['logout']) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    setcookie('currentUser', '', time() - 42000, '/');
} 

if (isset($_POST['auth'])) {
    
    include $_SERVER['DOCUMENT_ROOT'] . '/include/logins.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php';
    
    if (isset($_COOKIE['currentUser'])) {
        $login = $_COOKIE['currentUser'];
    }

    $index = array_search($login, $logins);
    $isAuthenticated = $index !== false && $passwords[$index] == $password;

    if (isset($isAuthenticated) && $isAuthenticated) {
        session_start();
        setcookie(session_name(), session_id(), time() + 60 * 20, '/');
        $_SESSION['isAuthenticated'] = true;
        $_SESSION['login'] = $login;
        $_SESSION[session_name()] = session_id();
        setcookie('currentUser', $_SESSION['login'], time() + 60 * 60 * 24 * 30, '/');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

    <div class="header">
    	<div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project">
        </div>
        <div class="clearfix"></div>
    </div>

    <?php showMenu($mainMenu) ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1>
                    <?= showCaption($mainMenu); ?>
                </h1> 
 