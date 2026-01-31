<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges;

use Decorator\SolutionV1\Order\Order;

class ChargesBase implements ChargesInterface
{
    public function __construct(
        public Order $order
    ) {}

    public function apply(): float
    {
        return $this->order->obj->baseOrderValue;
    }
}
