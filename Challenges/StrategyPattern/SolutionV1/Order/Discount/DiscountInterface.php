<?php

declare(strict_types=1);

namespace APP\SolutionV1\Order\Discount;

interface DiscountInterface
{
    public function apply(float $amount): float;
}
