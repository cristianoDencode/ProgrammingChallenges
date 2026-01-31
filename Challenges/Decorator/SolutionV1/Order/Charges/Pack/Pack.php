<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges\Pack;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\ChargesInterface;

class Pack implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        $total = $this->charges->apply();
        if ($this->order->obj->hasPremiumPackaging) {
            return $total += 5;
        }

        return $total;
    }
}
