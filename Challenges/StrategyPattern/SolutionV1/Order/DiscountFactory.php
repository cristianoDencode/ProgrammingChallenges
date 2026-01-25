<?php

namespace APP\SolutionV1\Order;

use APP\SolutionV1\Order\Discount\DiscountInterface;
use APP\SolutionV1\Order\Discount\EmployeeDiscount;
use APP\SolutionV1\Order\Discount\RegularDiscount;
use APP\SolutionV1\Order\Discount\VipDiscount;

class DiscountFactory
{
    public static function make(string $type): DiscountInterface
    {
        return match ($type) {
            'vip' => new VipDiscount(),
            'employee' => new EmployeeDiscount(),
            'regular' => new RegularDiscount(),
            default => throw new \Exception('Invalid customer type')
        };
    }
}
