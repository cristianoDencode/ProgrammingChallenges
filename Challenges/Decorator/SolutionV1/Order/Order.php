<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order;

use Decorator\SolutionV1\Order\Charges\ChargesInterface;
use Decorator\SolutionV1\Order\Charges\ChargesBase;
use Decorator\SolutionV1\Order\Charges\Delivery\Delivery;
use Decorator\SolutionV1\Order\Charges\Pack\Pack;
use Decorator\SolutionV1\Order\Charges\Tip\Tip;
use Decorator\SolutionV1\Order\Charges\CustomerType\CustomerType;
use Decorator\SolutionV1\Order\Charges\OrderPeriod\OrderPeriod;

class Order
{
    private array $couponInstance;

    public function __construct(
        public object $obj
    ) {}

    public function addRate(string $couponClass): void
    {
        if (!is_subclass_of($couponClass, ChargesInterface::class)) {
            throw new \InvalidArgumentException("{$couponClass} precisa implementar ChargesInterface");
        }

        $this->couponInstance[] = $couponClass;
    }

    public function process(): float
    {
        $total = new ChargesBase($this);
        $total = new Delivery($this, $total);
        $total = new Pack($this, $total);
        $total = new Tip($this, $total);

        foreach ($this->couponInstance as $className) {
            $coupon = new $className($this, $total);
            if ($coupon->isApplicable()) {
                $total = $coupon;
            }
        }

        $total = new CustomerType($this, $total);
        $total = new OrderPeriod($this, $total);
        $total = $total->apply();

        return max(0, $total);
    }
}
