<div class="project-folders-menu">
    <ul class="project-folders-v">
        
        <?php if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated']) : ?>
            <li class="project-folders-v-active"><a href="/?logout=true">Выйти</a></li>
        <?php else : ?>
            <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
            <li><a href="#">Регистрация</a></li>
            <li><a href="#">Забыли пароль?</a></li>
        <?php endif; ?>
        
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
                    <?php if (!isset($_COOKIE['currentUser'])) : ?>
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш логин:</label>
                                <input id="login_id" size="30" name="login" value="<?= htmlspecialchars($login) ?>">
                            </td>
                        </tr>
                    <?php endif; ?>
                       
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30" name="password" type="password" value="<?= htmlspecialchars($password) ?>">
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
