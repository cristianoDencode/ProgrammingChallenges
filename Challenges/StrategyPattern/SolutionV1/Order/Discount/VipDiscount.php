<?php

declare(strict_types=1);

namespace APP\SolutionV1\Order\Discount;

class VipDiscount implements DiscountInterface
{
    public function apply(float $finalAmount): float
    {
        return $finalAmount -= $finalAmount * 0.10;
    }
}
