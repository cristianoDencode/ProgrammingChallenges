<?php

namespace APP\SolutionV1\Order\Rate;

class CreditCardRate implements RateInterface
{
    public function apply(float $finalAmount): float
    {
        if ($finalAmount > 100) {
            $finalAmount += $finalAmount * 0.02;
        }

        return $finalAmount;
    }
}
