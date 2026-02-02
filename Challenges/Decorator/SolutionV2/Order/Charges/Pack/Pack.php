<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Charges\Pack;

use Decorator\SolutionV2\Order\Order;
use Decorator\SolutionV2\Order\Charges\ChargesInterface;

class Pack implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        $total = $this->charges->apply();
        if ($this->order->orderDto->hasPremiumPackaging) {
            return $total += 5;
        }

        return $total;
    }
}
