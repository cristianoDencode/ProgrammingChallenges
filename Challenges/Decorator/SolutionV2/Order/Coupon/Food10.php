<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Coupon;

use Decorator\SolutionV2\Order\OrderDto\OrderDto;

class Food10 implements CouponInterface
{
    private CouponInterface $next;

    public function applyCoupon(OrderDto $orderDto): object
    {
        if ('FOOD10' === $orderDto->couponCode) {
            $orderDto->discountedValue -= 10;

            return $orderDto;
        }

        $this->next->applyCoupon($orderDto);
    }

    public function setNext(CouponInterface $next): void
    {
        $this->next = $next;
    }
}
