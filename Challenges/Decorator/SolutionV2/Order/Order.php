<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order;

use Decorator\SolutionV2\Order\OrderDto\OrderDto;
use Decorator\SolutionV2\Order\Charges\ChargesInterface;
use Decorator\SolutionV2\Order\Charges\ChargesBase;
use Decorator\SolutionV2\Order\Charges\Delivery\Delivery;
use Decorator\SolutionV2\Order\Charges\Pack\Pack;
use Decorator\SolutionV2\Order\Charges\Tip\Tip;
use Decorator\SolutionV2\Order\Charges\CustomerType\CustomerType;
use Decorator\SolutionV2\Order\Charges\OrderPeriod\OrderPeriod;

class Order
{
    private array $couponInstance;

    public function __construct(
        public OrderDto $orderDto
    ) {}

    public function process(): float
    {
        $total = new ChargesBase($this);
        $total = new Delivery($this, $total);
        $total = new Pack($this, $total);
        $total = new Tip($this, $total);
        $total = new CustomerType($this, $total);
        $total = new OrderPeriod($this, $total);
        $total = $total->apply();

        return max(0, $total);
    }
}
