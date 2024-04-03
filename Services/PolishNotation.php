<?php

namespace Services;

use Services\Operators\AbstractOperator;

class PolishNotation
{
    /**
     * @var array
     */
    protected array $operators = [];

    /**
     * @param array $operators
     */
    public function __construct(array $operators)
    {
        foreach ($operators as $operator) {
            if (!$operator instanceof AbstractOperator) {
                throw new \InvalidArgumentException('Invalid Operator');
            }

            $this->operators[$operator->getSymbol()] = $operator;
        }
    }

    /**
     * @param string $input
     *
     * @return float
     */
    public function calculate(string $input): float {
        $stack = [];
        $params = explode(" ", $input);

        foreach ($params as $param) {
            if (array_key_exists($param, $this->operators)) {
                $right = array_pop($stack);
                $left = array_pop($stack);
                $operation = $this->operators[$param];
                $value = $operation->calculate($left, $right);
                $stack[] = $value;
            } elseif (is_numeric($param)) {
                $stack[] = $param;
            } else {
                throw new \InvalidArgumentException('Invalid input');
            }
        }

        return array_pop($stack);
    }
}