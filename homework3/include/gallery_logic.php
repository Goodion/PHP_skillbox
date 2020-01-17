<?php

$dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
$url = '/upload/';
$resultFilesString = '';

function checkEmptyDir(string $dir)
{
    $isEmpty = count(glob("$dir/*")) === 0; 
    return $isEmpty;
}

function determinateFilePath(string $fileName, string $dir)
{
    $filePath = $dir . $fileName;
    return $filePath;
}

function checkFileModificationDate(string $filePath)
{
    $fileModificationDate = filectime($filePath);
    return $fileModificationDate;
}

function checkFileSize(string $filePath)
{
    $fileSize = filesize($filePath);
    return $fileSize;
}

function dateMask($UnixTime)
{
    $dateMask = date('d.m.Y H:i:s', $UnixTime);
    return $dateMask;
}

function sizeMask($fileSizeBytes)
{
    if ($fileSizeBytes <= (1024 * 10)) {
        $sizeMask = round($fileSizeBytes) . ' b';
    } else if ($fileSizeBytes > (1024 * 10) && $fileSizeBytes <= (1024 * 1024)) {
        $sizeMask = round($fileSizeBytes / 1024) . ' Kb';
    } else if ($fileSizeBytes > (1024 * 1024)   ) {
        $sizeMask = round($fileSizeBytes / (1024 * 1024)) . ' Mb';
    }

    return $sizeMask;
}

function showGallery() 
{
    global $dir, $url;
    if (!checkEmptyDir($dir)) {
        $filesArr = scandir($dir);
        foreach ($filesArr as $file) {
            if ($file !== '..' && $file !== '.') {
                $fileName = $file;
                $fileUrl = $url . $fileName;
                $filePath = determinateFilePath($fileName, $dir);
                $fileModificationDate = dateMask(checkFileModificationDate($filePath));
                $fileSize = sizeMask(checkFileSize($filePath));

                include $_SERVER['DOCUMENT_ROOT'] . '/templates/gallery_template.php';
            
            }
        }
    }
}
    
?>
