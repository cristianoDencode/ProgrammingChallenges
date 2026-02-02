<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Coupon;
use Decorator\SolutionV2\Order\OrderDto\OrderDto;

interface CouponInterface
{
    public function applyCoupon(OrderDto $orderDto): object;
    public function setNext(CouponInterface $next): void;
}
