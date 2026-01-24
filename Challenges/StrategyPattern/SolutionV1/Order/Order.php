<?php
namespace APP\SolutionV1\Order;
use APP\SolutionV1\Order\Discount\DiscountInterface;
use APP\SolutionV1\Order\Rate\RateInterface;
use APP\SolutionV1\Order\SpecialConditionApplier;

class Order
{
    public function __construct(
        private float $baseAmount,
        private DiscountInterface $discount,   
        private RateInterface $ratePayment 
    ) {
    }

    public function calculate()
    {
        $discont = $this->discount->apply($this->baseAmount);
        $rate = $this->ratePayment->apply($discont);
        return SpecialConditionApplier::apply($rate, $this->discount, $this->ratePayment);
    }
}