<?php

if (! empty($_FILES['myFiles']['name'][0])) {
    
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $files = $_FILES['myFiles'];
    $filesTransferred = count($files['tmp_name']);

    $replyMessage = false;
    $tooManyFilesError = NULL;
    $tooLargeFileError = NULL;
    $wrongFileTypeError = NULL;
    $noFileSentError = NULL;
    $fileUpploadedSuccess = NULL;
    $fileTransferError = NULL;

    if ($filesTransferred > 5) {
        
        $tooManyFilesError = 'Вы передали более 5 файлов';
        
    } else {

        for ($i = 0; $i < $filesTransferred; $i++) {
            
            $fileType = mb_substr(mime_content_type($files['tmp_name'][$i]), 0, 5); 
            
            if (! empty($files['name'][$i])) {
                
                if ($fileType === 'image') {

                    if ($files['size'][$i] <= 5242880) {

                        $approvedFiles[$i] = $files['name'][$i];
                    
                    } else {
                        $tooLargeFileError[] = $files['name'][$i] . ' НЕ подходит по размеру (больше 5 Мб)';
                    }
                } else {
                    $wrongFileTypeError[] = $files['name'][$i] . ' НЕ подходит по типу (не изображение)';
                }   
            } else {
                $noFileSentError = 'Вы не выбрали ни одного подходящего файла'; 
            }
        }
    }

    if (isset($approvedFiles) && ! empty($approvedFiles)) {
        foreach ($approvedFiles as $key => $value) {
            if (move_uploaded_file($files['tmp_name'][$key], $uploadPath . $files['name'][$key])) {
                $fileUpploadedSuccess[] = $files['name'][$key] . ' успешно загружен';
            } else {
                $fileTransferError[] = $files['name'][$key] . ' НЕ загружен, произошла ошибка';
            }
        } 
    }  

    if (isset($tooManyFilesError)) {
        $replyMessageArr[] = $tooManyFilesError;
    }

    if (isset($tooLargeFileError)) {
        foreach ($tooLargeFileError as $key) {
            $replyMessageArr[] = $key;
        }
    }

    if (isset($wrongFileTypeError)) {
        foreach ($wrongFileTypeError as $key) {
            $replyMessageArr[] = $key;
        }
    }

    if (isset($noFileSentError)) {
        $replyMessageArr[] = $noFileSentError;
    }

    if (isset($fileUpploadedSuccess)) {
        foreach ($fileUpploadedSuccess as $key) {
            $replyMessageArr[] = $key;
        }
    }

    if (isset($fileTransferError)) {
        foreach ($fileTransferError as $key) {
            $replyMessageArr[] = $key;
        }
    }

    $replyMessage = implode('<br>', $replyMessageArr);
    
    echo json_encode($replyMessage);
    exit;
}
