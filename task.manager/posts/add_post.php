<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/add_post_logic.php';
?>

<form method="post" action="/posts/add/" id="send_message_form">
    <input type="text" value="" size="60" placeholder="Заголовок" name="caption">
    <textarea cols="60" rows="10" placeholder="Введите сообщение..." name="text"></textarea>
    <p> Кому отправить: </p>
        <select name="userId">
            <?php foreach (getApprovedUsers() as $user) : ?>   
                <option value ="<?= $user['user_id'] ?>">
                    <?= $user['user_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    <p> Раздел сообщения: </p>
        <select name="sectionId">
            <?php foreach (getSections($_SESSION['userId']) as $section) : ?>   
                <option style="color:<?= $section['section_color'] ?>" value ="<?= $section['section_caption'], ',', $section['color_id'] ?>">
                    <?= $section['section_caption'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    <p>
        <input type="submit" value="отправить" name="submit">
    </p>
    <p id="message">
    </p>
</form>
