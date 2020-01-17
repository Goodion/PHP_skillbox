<?php

$result = null;

if (checkRegistered() && ! checkApproved()) {
    $result = 'Вы сможете отправлять сообщения после прохождения модерации.';
} else if (! checkRegistered() && ! checkApproved()) {
    echo('Внимание! Данная страница не найдена.');
    exit;
}

if (isset($_SESSION['isApproved']) && $_SESSION['isApproved'] === true) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/posts_logic.php';    
}

?>

<p> <?= $result ?> </p>