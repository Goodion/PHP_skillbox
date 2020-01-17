<?php

$studentsCount = rand(1, 100000);
$rest = 0;

if ($studentsCount > 19) {
    $rest = intval(substr($studentsCount, -2));
} 

if ($rest > 19) {
    $rest = intval(substr($rest, -1));
} elseif ($rest >= 5 && $rest <= 19) {
    $suffix = 'ов';
} else {
    $rest = $studentsCount;
}

switch ($rest) {
    case 1:
        $suffix = '';
        break;
    case 2:
    case 3:
    case 4:
        $suffix = 'а';
        break;
    default:
        $suffix = 'ов';
        break; 
}

$format = 'на учебе %d студент%s';
echo sprintf($format, $studentsCount, $suffix);
