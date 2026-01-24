<?php
namespace App\SolutionV1\Order\Discount;

class VipDiscount implements DiscountInterface
{
    public function apply (float $finalAmount): float
    {
        return $finalAmount -= $finalAmount * 0.10;
    }
}