<?php

    if (! checkRegistered() && ! checkApproved()) {
        echo('Внимание! Данная страница не найдена.');
        exit;
    }
    
    $stmt = connect()->prepare('SELECT active, name, email, phone, email_newsletter FROM users WHERE email = ?');
    $stmt->execute(array($_SESSION['login']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $active = $row['active'] ? 'активен' : 'неактивен';
    $phone = $row['phone'] ?? 'не указан';
    $emailNewsletter = $row['email_newsletter'] ? 'подписан' : 'не подписан'; 

    $lists = checkGroupsPermissions();
