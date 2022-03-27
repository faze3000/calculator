<?php

namespace App\Entity;

use App\Operator\CalculatorOperation;

class Calculator
{
    protected $number1;
    protected $operation;
    protected $number2;

    public function getNumber1(): float
    {
        return $this->number1;
    }
    public function setNumber1(float $number1): void
    {
        $this->number1 = $number1;
    }
    public function getNumber2(): float
    {
        return $this->number2;
    }
    public function setNumber2(float $number2): void
    {
        $this->number2 = $number2;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation)
    {
        $this->operation = $operation;
    }
}
