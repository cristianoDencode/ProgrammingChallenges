<?php

namespace APP\SolutionV1\Order\Discount;

interface DiscountInterface
{
    public function apply(float $amount): float;
}
