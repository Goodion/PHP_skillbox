<?php

function array_get($array, $key, $default = null)
{
    $keysArray = explode('.', $key);
    $path = $array;

    for ($i = 0; $i < count($keysArray); $i++) {
        if (is_array($path) && array_key_exists($keysArray[$i], $path)) {
            $path = $path[$keysArray[$i]];
        } else {
            $path = $default;
            break;
        }
    }

    /* if (is_array($path)) {
        $path = $default;
    } */

    return $path;
}
