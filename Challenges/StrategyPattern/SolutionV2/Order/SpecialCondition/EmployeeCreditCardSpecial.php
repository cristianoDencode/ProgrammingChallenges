<?php
namespace APP\SolutionV2\Order\SpecialCondition;
use APP\SolutionV2\Order\SpecialCondition\SpecialConditionInterface;
use APP\SolutionV2\Order\Order;

class EmployeeCreditCardSpecial  implements SpecialConditionInterface
{
    public function isApplicable(Order $order): bool 
    {
        return $order->customerType === 'employee' && $order->paymentMethod === 'credit_card';
    }

    public function apply (float $finalAmount): float
    {
        return $finalAmount += 10;
    }
}