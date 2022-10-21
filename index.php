<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'LuckyTickets.php';

$startStr = filter_input(INPUT_GET, 'start');
$endStr = filter_input(INPUT_GET, 'end');
$start = (int) $startStr;
$end = (int) $endStr;

if ($start > $end) {
    $start = 0;
}
if ($end > 999999) {
    $end = 0;
}

if ($start && $end) {
    $out = LuckyTickets::run($start, $end);
    switch ($out) {
        case 0:
            echo 'There no lucky ticket';
            break;
        case 1:
            echo 'There is ' . $out . ' lucky ticket';
            break;
        default:
            echo 'There are ' . $out . ' lucky tickets';
    }
} else {
    echo 'Parameter is not valid';
}
