<?php

declare(strict_types=1);

namespace APP\SolutionV2\Order\Rate;

use APP\SolutionV2\Order\Order;

class BankSlipRate implements RateInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'bank_slip' === $order->paymentMethod;
    }

    public function apply(float $finalAmount): float
    {
        return $finalAmount += 3;
    }
}
