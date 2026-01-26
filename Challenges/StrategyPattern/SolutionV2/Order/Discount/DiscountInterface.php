<?php

declare(strict_types=1);

namespace APP\SolutionV2\Order\Discount;

use APP\SolutionV2\Order\Order;

interface DiscountInterface
{
    public function isApplicable(Order $order): bool;

    public function apply(float $amount): float;
}
