<?php
namespace App\Operator;

class MultiplyOperation implements CalculatorOperation
{
    public function calculate(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }
}
