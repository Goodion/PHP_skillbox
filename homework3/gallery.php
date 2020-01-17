<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/gallery_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/delete_script.php';
?>

<div class="container">
    <a href="/" class="badge badge-primary">К загрузке файлов</a>
    
</div>

<form method="post">
    <input class="btn btn-primary" type="submit" name="formSubmit" value="Удалить выбранные">
    <div class="row row-cols-4">
        <?= showGallery() ?>
    </div>
</form>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
