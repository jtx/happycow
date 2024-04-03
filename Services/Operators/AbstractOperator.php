<?php

namespace Services\Operators;

abstract class AbstractOperator
{
    /**
     * @var string
     */
    protected string $symbol;

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param float $first
     * @param float $second
     *
     * @return float
     */
    abstract public function calculate(float $first, float $second): float;
}
