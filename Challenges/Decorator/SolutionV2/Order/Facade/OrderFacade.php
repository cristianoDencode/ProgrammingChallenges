<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Facade;

use Decorator\SolutionV2\Order\OrderDto\OrderDto;
use Decorator\SolutionV2\Order\Order;
use Decorator\SolutionV2\Order\Coupon\Food10;
use Decorator\SolutionV2\Order\Coupon\Food20;
use Decorator\SolutionV2\Order\Coupon\FinalCoupon;

class OrderFacade
{
    public function process(OrderDto $orderDto): float
    {
        $orderDto->discountedValue = $orderDto->baseOrderValue;
        $couponFood10 = new Food10();
        $couponFood20 = new Food20();
        $couponFinal = new FinalCoupon();
        $couponFood10->setNext($couponFood20);
        $couponFood20->setNext($couponFinal);
        $discount = $couponFood10->applyCoupon($orderDto);
        $order = new Order($discount);

        return $order->process();
    }
}
