<?php
namespace App\Operator;

interface CalculatorOperation
{
    public function calculate(float $value1, float $value2);
}