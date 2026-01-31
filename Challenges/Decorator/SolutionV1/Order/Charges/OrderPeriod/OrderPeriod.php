<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges\OrderPeriod;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\ChargesInterface;

class OrderPeriod implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        if ($this->order->obj->isNightTime) {
            $total = $this->charges->apply();

            return $total += 8.00;
        }
    }
}
