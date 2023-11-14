<?php

use App\Date;

require_once __DIR__ . '/vendor/Autoload.php';

try {
    $date = new Date(6, 'February', 2001);
    $date0 = new Date(6, 'February', 2001);
    $date1 = new Date(17, 'May', 2005);
    if ($date->isEqualTo($date0)) {
        echo $date->format('D-m-Y', '/') . ' та ' . $date0->format('D-m-Y', '/') . ' одинакові.' . PHP_EOL;
    } else {
        echo $date->format('D-m-Y', '/') . ' та ' . $date0->format('D-m-Y', '/') . ' не є одинаковими.' . PHP_EOL;
    }

    echo $date->isEqualTo($date1) . PHP_EOL . PHP_EOL;
    echo $date->dateDifference($date1) . PHP_EOL . PHP_EOL;

    echo $date->format('D-m-Y', '/') . PHP_EOL;
    echo $date1->format('d-M-y', '/') . PHP_EOL;

    $date3 = new Date(-1, 'December', 1995);
} catch (InvalidArgumentException $e) {
    echo 'Exception: ' . $e->getMessage() . PHP_EOL;
}
