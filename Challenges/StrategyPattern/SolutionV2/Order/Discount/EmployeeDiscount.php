<?php

declare(strict_types=1);

namespace APP\SolutionV2\Order\Discount;

use APP\SolutionV2\Order\Order;

class EmployeeDiscount implements DiscountInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'employee' === $order->customerType;
    }

    public function apply(float $finalAmount): float
    {
        return $finalAmount -= $finalAmount * 0.20;
    }
}
