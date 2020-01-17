<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/message_read_logic.php';
?>

<h3><?= $message['m_caption'] ?></h3>

<p> 
    Отправитель: <?= $message['m_sender_name'] ?><br />
    Логин/почта отправителя: <?= $message['m_sender_email'] ?><br />
    Отправлено: <?= $message['m_creation_date'] ?><br />
</p>

<p><?= $message['m_text'] ?></p>