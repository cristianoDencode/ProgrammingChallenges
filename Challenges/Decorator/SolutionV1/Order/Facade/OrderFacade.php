<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Facade;

use Decorator\SolutionV1\Order\Order;
use Decorator\SolutionV1\Order\Charges\Coupon\Food10;
use Decorator\SolutionV1\Order\Charges\Coupon\Food20;

class OrderFacade
{
    public function process($obj): float
    {
        $order = new Order($obj);
        $order->addRate(Food10::class);
        $order->addRate(Food20::class);

        return $order->process();
    }
}
