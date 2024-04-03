<?php

namespace Services\Operators;

class Division extends AbstractOperator
{
    /**
     * @var string
     */
    protected string $symbol = '/';

    /**
     * @param float $first
     * @param float $second
     *
     * @return float
     * @throws \Exception
     */
    public function calculate(float $first, float $second): float
    {
        if ($second == 0) {
            throw new \DivisionByZeroError();
        }

        return $first / $second;
    }
}