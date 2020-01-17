<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu_functions.php';

$isAuthenticated = null;
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
    
if (isset($_POST['auth'])) {
    
    include $_SERVER['DOCUMENT_ROOT'] . '/include/logins.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php';
    $index = array_search($login, $logins);
    $isAuthenticated = $index !== false && $passwords[$index] == $password;

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
                <?= showCaption($mainMenu) ?>
                </h1> 
        
    
