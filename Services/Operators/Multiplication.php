<?php

namespace Services\Operators;

class Multiplication extends AbstractOperator
{
    /**
     * @var string
     */
    protected string $symbol = '*';

    /**
     * @param float $first
     * @param float $second
     *
     * @return float
     */
    public function calculate(float $first, float $second): float
    {
        return $first * $second;
    }
}