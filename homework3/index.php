<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/include/upload_script.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>

<div class="container">
    <a href="/gallery.php" class="badge badge-primary">В галерею</a>
</div>

<div class="container">
    <form enctype="multipart/form-data" method="POST" id="fileUploadForm" name="fileUploadForm" action="/include/upload_script.php">
        <div class="form-group">
            <label for="form-control-file">Выберите до 5 файлов изображений до 5 МБ размером каждый:</label>
            <input type="file" name="myFiles[]" class="form-control-file" multiple accept=".jpeg,.jpg,.png,.bmp,.gif">
        </div>
        <div class="container">
            <input class="btn btn-primary" type="submit" value="Загрузить" name="upload" id="upload">
        </div>
    </form>
    <p id="message">
    </p>
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
    