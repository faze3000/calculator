<?php
namespace App;

use App\Operator\CalculatorOperation;
use http\Exception\InvalidArgumentException;

class CalculatorService
{
    private $operators;

    public function calculate(string $operator, float $value1, float $value2)
    {
        if (!array_key_exists($operator, $this->operators)) {
        throw new InvalidArgumentException(sprintf('Unknown operator "%s"', $operator));
        }
        return $this->operators[$operator]->calculate($value1, $value2);
    }
    public function addOperator($operator, CalculatorOperation $operation)
    {
        $this->operators[$operator] = $operation;
    }
}