<?php
namespace APP\SolutionV2\Order\Discount;
use APP\SolutionV2\Order\Order;

class RegularDiscount implements DiscountInterface
{
    public function isApplicable(Order $order): bool 
    {
        return $order->customerType === 'regular';
    }

    public function apply (float $finalAmount): float
    {
        return $finalAmount;
    }
}