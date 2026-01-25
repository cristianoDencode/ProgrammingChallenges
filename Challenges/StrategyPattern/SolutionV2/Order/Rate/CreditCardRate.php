<?php

namespace APP\SolutionV2\Order\Rate;

use APP\SolutionV2\Order\Order;

class CreditCardRate implements RateInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'credit_card' === $order->paymentMethod;
    }

    public function apply(float $finalAmount): float
    {
        if ($finalAmount > 100) {
            $finalAmount += $finalAmount * 0.02;
        }

        return $finalAmount;
    }
}
