<?php
namespace APP\SolutionV1\Order\Discount;

class EmployeeDiscount implements DiscountInterface
{
    public function apply (float $finalAmount): float
    {
        return $finalAmount -= $finalAmount * 0.20;
    }
}