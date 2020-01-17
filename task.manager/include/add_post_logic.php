<?php

if (! checkApproved()) {
    echo('Внимание! Данная страница не найдена.');
    exit;
}

if (isset($_POST['caption'])) {
    $caption = htmlspecialchars($_POST['caption']);
    $text = htmlspecialchars($_POST['text']);
    $userId = htmlspecialchars($_POST['userId']);
    $sectionColor = htmlspecialchars($_POST['sectionId']);
    $sectionColor = explode(',', $sectionColor);
    $section = $sectionColor[0];
    $color = $sectionColor[1];
    $replyMessage = '';
    $parent = null;
    $sender_id = $_SESSION['userId'];

    if (! empty($caption) && ! empty($text) && ! empty($userId) && is_numeric($userId)) {
        $sections = getSections($userId);

        $found = false;
        foreach ($sections as $key=>$value) {
            if ($value['section_caption'] === $section) {
                $found = true;
                $sectionId = $value['section_id'];
                break;
            }
        }

        if ($found === false) {
            addSection($section, $userId, $color, $parent);
        } 

        addMessage($text, $caption, $sectionId, $sender_id, $userId);

        $replyMessage = '<span id="answer">Сообщение успешно отправлено</span>';
    
    } else {
        $replyMessage = '<span id="answer">Заполните все поля</span>';
    }

    echo($replyMessage);
    exit;
}
