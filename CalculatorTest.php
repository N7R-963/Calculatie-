<?php

use PHPUnit\Framework\TestCase;
use Project_calculator\Calculator;

class CalculatorTest extends TestCase
{
    /* ================= ADD ================= */

    public function testAddTwoPositiveNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(8, $calculator->add(5, 3));
    }

    public function testAddNegativeNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(-8, $calculator->add(-5, -3));
    }

    public function testAddWithZero(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->add(5, 0));
    }

    /* ================= SUBTRACT ================= */

    public function testSubtractTwoNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(2, $calculator->subtract(5, 3));
    }

    public function testSubtractNegativeResult(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(-2, $calculator->subtract(3, 5));
    }

    public function testSubtractWithZero(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->subtract(5, 0));
    }

    /* ================= MULTIPLY ================= */

    public function testMultiplyTwoPositiveNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(15, $calculator->multiply(5, 3));
    }

    public function testMultiplyWithZero(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->multiply(5, 0));
    }

    public function testMultiplyNegativeNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(-15, $calculator->multiply(-5, 3));
    }

    /* ================= DIVIDE ================= */

    public function testDivideTwoNumbers(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(2, $calculator->divide(6, 3));
    }

    public function testDivideWithDecimalResult(): void
    {
        $calculator = new Calculator();
        $this->assertEquals(2.5, $calculator->divide(5, 2));
    }

    public function testDivideByZeroThrowsException(): void
    {
        $calculator = new Calculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Delen door nul is niet mogelijk!");

        $calculator->divide(5, 0);
    }

    /* ================= VALIDATION TESTS ================= */

    public function testAddWithNonNumericFirstParameterThrowsException(): void
    {
        $calculator = new Calculator();
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Alleen numerieke waarden zijn toegestaan");
        
        $calculator->add("string", 5);
    }

    public function testAddWithNonNumericSecondParameterThrowsException(): void
    {
        $calculator = new Calculator();
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Alleen numerieke waarden zijn toegestaan");
        
        $calculator->add(5, "string");
    }
}