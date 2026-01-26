<?php

declare(strict_types=1);

namespace APP\SolutionV1\Order\Rate;

class PixRate implements RateInterface
{
    public function apply(float $finalAmount): float
    {
        return $finalAmount -= 5;
    }
}
