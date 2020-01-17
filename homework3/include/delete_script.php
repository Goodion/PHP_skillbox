<?php

if (isset($_POST['deleteListCheckbox'])) {
    $deleteList = $_POST['deleteListCheckbox'];
    foreach ($deleteList as $file) {
        $fileName = $file;
        $filePath = determinateFilePath($fileName, $dir);
        unlink($filePath);
    }
    exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
}
