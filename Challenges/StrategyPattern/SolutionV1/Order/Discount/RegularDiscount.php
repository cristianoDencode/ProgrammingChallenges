<?php
namespace App\SolutionV1\Order\Discount;

class RegularDiscount implements DiscountInterface
{
    public function apply (float $finalAmount): float
    {
        return $finalAmount;
    }
}