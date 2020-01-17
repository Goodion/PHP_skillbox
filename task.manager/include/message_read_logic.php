<?php

if (! checkApproved()) {
    echo('Внимание! Данная страница не найдена.');
    exit;
}

$isVerified = null;

if (isset($_GET['message_id']) && is_numeric($_GET['message_id'])) {
    $message_id = $_GET['message_id'];
    if (checkMessageReadPermission($message_id)) {
        $isVerified = true;
    } else {
        echo ('у Вас нет прав на чтение данного сообщения');
        exit;
    }
}

if ($isVerified) {
    setMessageRead($message_id);
    $message = getMessageContent($message_id);
}
