<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Charges;

use Decorator\SolutionV2\Order\Order;

class ChargesBase implements ChargesInterface
{
    public function __construct(
        public Order $order
    ) {}

    public function apply(): float
    {
        return $this->order->orderDto->discountedValue;
    }
}
