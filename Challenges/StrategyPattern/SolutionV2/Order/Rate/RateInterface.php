<?php

declare(strict_types=1);

namespace APP\SolutionV2\Order\Rate;

use APP\SolutionV2\Order\Order;

interface RateInterface
{
    public function isApplicable(Order $order): bool;

    public function apply(float $amount): float;
}
