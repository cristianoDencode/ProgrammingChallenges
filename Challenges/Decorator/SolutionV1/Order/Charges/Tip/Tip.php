<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges\Tip;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\ChargesInterface;

class Tip implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        $total = $this->charges->apply();
        if ($this->order->obj->tipAmount > 0) {
            return $total += $this->order->obj->tipAmount;
        }

        return $total;
    }
}
