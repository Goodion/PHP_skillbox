<?php

define('APP_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/view/');

spl_autoload_register(function ($class) {

$prefix = 'src\\App\\';
$base_dir = APP_DIR . '/src/App/';

$len = strlen($prefix);
if (strncmp($prefix, $class, $len) !== 0) {
    return;
}

$relative_class = substr($class, $len);

$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

if (file_exists($file)) {
    require $file;
}

});
