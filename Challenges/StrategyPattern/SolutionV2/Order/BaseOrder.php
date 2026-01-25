<?php
namespace APP\SolutionV2\Order;

abstract class BaseOrder implements OrderInterface 
{
    public function __construct(
        public float $baseAmount,
        public string $customerType,
        public string $paymentMethod
    ) {
    }

    protected function clampToZero(float $amount): float 
    {
        return max(0, $amount);
    }
}