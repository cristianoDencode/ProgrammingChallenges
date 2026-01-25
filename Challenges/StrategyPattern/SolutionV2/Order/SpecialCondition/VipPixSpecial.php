<?php

namespace APP\SolutionV2\Order\SpecialCondition;

use APP\SolutionV2\Order\Order;

class VipPixSpecial implements SpecialConditionInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'vip' === $order->customerType && 'pix' === $order->paymentMethod;
    }

    public function apply(float $finalAmount): float
    {
        return $finalAmount -= 2;
    }
}
