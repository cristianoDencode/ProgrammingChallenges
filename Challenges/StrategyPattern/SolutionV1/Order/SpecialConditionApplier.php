<?php

declare(strict_types=1);

namespace APP\SolutionV1\Order;

use APP\SolutionV1\Order\Discount\DiscountInterface;
use App\SolutionV1\Order\Discount\EmployeeDiscount;
use App\SolutionV1\Order\Discount\VipDiscount;
use APP\SolutionV1\Order\Rate\CreditCardRate;
use APP\SolutionV1\Order\Rate\PixRate;
use APP\SolutionV1\Order\Rate\RateInterface;

class SpecialConditionApplier
{
    public static function apply(float $amount, DiscountInterface $type, RateInterface $payment)
    {
        if ($type instanceof VipDiscount
        && $payment instanceof PixRate) {
            $amount -= 2;
        }

        if ($type instanceof EmployeeDiscount
        && $payment instanceof CreditCardRate) {
            $amount += 10;
        }

        if ($amount < 0) {
            $amount = 0;
        }

        return round($amount);
    }
}
