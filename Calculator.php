<?php

namespace Project_calculator;

use InvalidArgumentException;

class Calculator
{
    
    public function add($a, $b)
    {
        $this->validateNumbers($a, $b);
        return $a + $b;
    }

    public function subtract($a, $b)
    {
        $this->validateNumbers($a, $b);
        return $a - $b;
    }

    public function multiply($a, $b)
    {
        $this->validateNumbers($a, $b);
        return $a * $b;
    }

    public function divide($a, $b)
    {
        $this->validateNumbers($a, $b);
        
        if ($b == 0) {
            throw new InvalidArgumentException("Delen door nul is niet mogelijk!");
        }

        return $a / $b;
    }

    private function validateNumbers($a, $b): void
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException(
                "Alleen numerieke waarden zijn toegestaan. " .
                "Ontvangen: " . gettype($a) . " en " . gettype($b)
            );
        }
    }
}