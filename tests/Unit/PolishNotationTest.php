<?php

namespace tests\Unit;

use Services\PolishNotation;

class PolishNotationTest extends \PHPUnit\Framework\TestCase
{
    public function testSimpleAddition()
    {
        $polish = new PolishNotation([
            new \Services\Operators\Addition(),
        ]);

        $res = $polish->calculate('3 1 +');

        $this->assertEquals(4, $res);
    }

    public function testSimpleSubtraction()
    {
        $polish = new PolishNotation([
            new \Services\Operators\Subtraction(),
        ]);

        $res = $polish->calculate('3 1 -');

        $this->assertEquals(2, $res);
    }

    public function testSimpleMultiplication()
    {
        $polish = new PolishNotation([
            new \Services\Operators\Multiplication(),
        ]);

        $res = $polish->calculate('3 2 *');

        $this->assertEquals(6, $res);
    }

    public function testSimpleDivision()
    {
        $polish = new PolishNotation([
            new \Services\Operators\Division(),
        ]);


        $res = $polish->calculate('3 2 /');

        $this->assertEquals(1.5, $res);
    }

    public function testInputIsInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        $polish = new PolishNotation([
            new \Services\Operators\Division(),
        ]);

        $polish->calculate('abc 123');
    }

    public function testInvalidOperator()
    {
        $this->expectException(\InvalidArgumentException::class);
        $polish = new PolishNotation(['hello']);
    }

    public function testDivisionByZero()
    {
        $this->expectException(\DivisionByZeroError::class);
        $polish = new PolishNotation([
            new \Services\Operators\Division(),
        ]);

        $polish->calculate('3 0 /');
    }

    public function testComplicatedInput()
    {
        $polish = new PolishNotation([
            new \Services\Operators\Addition(),
            new \Services\Operators\Subtraction(),
            new \Services\Operators\Multiplication(),
            new \Services\Operators\Division(),
        ]);

        $res = $polish->calculate('15 7 1 1 + - / 3 * 2 1 1 + + -');
        $this->assertEquals(5, $res);
    }
}
