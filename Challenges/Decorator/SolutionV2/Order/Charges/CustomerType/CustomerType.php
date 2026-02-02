<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Charges\CustomerType;

use Decorator\SolutionV2\Order\Order;
use Decorator\SolutionV2\Order\Charges\ChargesInterface;

class CustomerType implements ChargesInterface
{
    public function __construct(
        public Order $order,
        public ChargesInterface $charges
    ) {}

    public function apply(): float
    {
        if ($this->order->orderDto->isLoyalCustomer) {
            $total = $this->charges->apply();
            return $total -= ($total * 0.05);
        }
    }
}
