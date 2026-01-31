<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges\CustomerType;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\ChargesInterface;

class CustomerType implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        if ($this->order->obj->isLoyalCustomer) {
            $total = $this->charges->apply();

            return $total -= ($total * 0.05);
        }
    }
}
