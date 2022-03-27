<?php
namespace App\Operator;

use App\Exception\DivisionByZeroException;

class DivideOperation implements CalculatorOperation
{
    /**
     * @param $value1
     * @param $value2
     * @return float|int
     * @throws DivisionByZeroException
     */
    public function calculate($value1, $value2)
    {
        if ($value2 == 0) {
            throw new DivisionByZeroException("You cannot divide by 0");
        }
        return $value1 / $value2;
    }
}
