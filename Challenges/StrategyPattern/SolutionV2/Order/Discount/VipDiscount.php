<?php

namespace APP\SolutionV2\Order\Discount;

use APP\SolutionV2\Order\Order;

class VipDiscount implements DiscountInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'vip' === $order->customerType;
    }

    public function apply(float $finalAmount): float
    {
        return $finalAmount -= $finalAmount * 0.10;
    }
}
