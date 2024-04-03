<?php

require_once 'vendor/autoload.php';

use Services\Operators\Addition;
use Services\Operators\Division;
use Services\Operators\Multiplication;
use Services\Operators\Subtraction;
use Services\PolishNotation;

try {
    if (!isset($argv[1])) {
        throw new \InvalidArgumentException('Input is empty');
    }

    $polish = new PolishNotation([
        new Addition(),
        new Subtraction(),
        new Multiplication(),
        new Division(),
    ]);

    echo $polish->calculate($argv[1]) . "\n";
} catch (\Throwable $e) {
    echo $e->getMessage() . "\n";
}
