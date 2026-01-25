<?php

namespace APP\SolutionV2\Order\SpecialCondition;

use APP\SolutionV2\Order\Order;

class EmployeeCreditCardSpecial implements SpecialConditionInterface
{
    public function isApplicable(Order $order): bool
    {
        return 'employee' === $order->customerType && 'credit_card' === $order->paymentMethod;
    }

    public function apply(float $finalAmount): float
    {
        return $finalAmount += 10;
    }
}
