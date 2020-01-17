<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
                
            
            </td>
            <td class="right-collum-index">
                
                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                
                <div class="index-auth">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <?php if (isset($_GET['login'])) : ?>
                                    <?php 
                                        if ($isAuthenticated) {
                                            include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
                                        } else if ($isAuthenticated === false) {
                                            include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php';
                                        }
                                    ?>
                                    <?php if (!$isAuthenticated) : ?>
                                        <form action="/?login=yes" method="POST">
                                            <tr>
                                                <td class="iat">
                                                    <label for="login_id">Ваш e-mail:</label>
                                                    <input id="login_id" size="30" name="login" value="<?= $login ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="iat">
                                                    <label for="password_id">Ваш пароль:</label>
                                                    <input id="password_id" size="30" name="password" type="password" value="<?= $password ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="submit" name="auth" value="Войти"></td>
                                            </tr>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </td>
    

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

