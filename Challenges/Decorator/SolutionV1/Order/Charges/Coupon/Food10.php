<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges\Coupon;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\ChargesInterface;

class Food10 implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function isApplicable(): bool
    {
        return 'FOOD10' === $this->order->obj->couponCode;
    }

    public function apply(): float
    {
        $total = $this->charges->apply();

        return $total -= 10;
    }
}
