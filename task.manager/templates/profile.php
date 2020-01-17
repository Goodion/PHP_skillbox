<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/include/profile_logic.php';
?>

    <h1>Информация о пользователе</h1>
    <p>
        <ul>
            <li>Активен: 
                <?= $active ?>
            </li>
            <li>Имя:
                <?= $row['name'] ?>
            </li>
            <li>Email/логин:
                <?= $row['email'] ?>
            </li>
            <li>Телефон:
                <?= $phone ?>
            </li>
            <li>Подписан на рассылку:
                <?= $emailNewsletter ?>
            </li>
        </ul>    
    </p>
    <p>
        <h3>Группы пользователя:</h3>
            <table class='lists'>
                <?php foreach ($lists as $key=>$value) : ?>
                    <tr>
                        <td>
                            <?= $value['caption'] ?>
                        </td>
                        <td>
                            <?= $value['description'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
    </p>
</td>
