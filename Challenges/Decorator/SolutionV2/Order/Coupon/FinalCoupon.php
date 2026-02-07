<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Coupon;

use Decorator\SolutionV2\Order\OrderDto\OrderDto;

class FinalCoupon implements CouponInterface
{
    private CouponInterface $next;

    public function applyCoupon(OrderDto $orderDto): object
    {
        return  $orderDto;
    }

    public function setNext(CouponInterface $next): void {}
}
