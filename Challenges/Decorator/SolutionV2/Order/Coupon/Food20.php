<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Coupon;

use Decorator\SolutionV2\Order\OrderDto\OrderDto;
use Decorator\SolutionV2\Order\Order;

class Food20 implements CouponInterface
{
    private CouponInterface $next;
    public function applyCoupon(OrderDto $orderDto): object
    {
        if('FOOD20' === $orderDto->couponCode) {
             $orderDto->discountedValue -= 20;
             return $orderDto;
        }
        $this->next->applyCoupon($orderDto); 
    }

    public function setNext(CouponInterface $next): void 
    {
        $this->next = $next;
    }
}
