<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\OrderDto;

class OrderDto extends \stdClass
{
    public float $baseOrderValue;
    public bool $hasDeliveryFee;
    public bool $hasPremiumPackaging;
    public float $tipAmount;
    public bool $isLoyalCustomer;
    public string $couponCode;
    public bool $isNightTime;
}
