<?php

namespace Tests\Unit\Operator;

use App\Operator\PlusOperation;
use PHPUnit\Framework\TestCase;

class PlusOperationTest extends TestCase
{
    /**
     * @covers ::calculate
     */
    public function testCalculate(): void
    {
        $plusOperator = new PlusOperation();
        $this->assertEquals('10', $plusOperator->calculate(4, 6));
    }
}