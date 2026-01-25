<?php

namespace APP\SolutionV2\Order;

use APP\SolutionV2\Order\Discount\DiscountInterface;
use APP\SolutionV2\Order\Rate\RateInterface;
use APP\SolutionV2\Order\SpecialCondition\SpecialConditionInterface;

class OrderCalculator
{
    private array $discountInstance;
    private array $ratesInstance;
    private array $specialConditionInstance;
    private float $amountCalc;

    public function addDiscount(DiscountInterface $discount): void
    {
        $this->discountInstance[] = $discount;
    }

    public function addRate(RateInterface $rate): void
    {
        $this->ratesInstance[] = $rate;
    }

    public function addSpecialCondition(SpecialConditionInterface $specialCondition): void
    {
        $this->specialConditionInstance[] = $specialCondition;
    }

    public function calculateDiscount(Order $order)
    {
        /*
            I'm not comfortable with this approach to keeping the Open/Closed Principle intact.
            It feels inherently brittle; a junior developer or a simple oversight could easily
            break the logic. While I can see the use case, it would significantly increase
            complexity—requiring us to implement a priority system or similar safeguards to
            prevent collisions."
        */
        foreach ($this->discountInstance as $discount) {
            if ($discount->isApplicable($order)) {
                return $this->amountCalc = $discount->apply($order->baseAmount);
            }
        }

        throw new \Exception('Invalid customer type');
    }

    public function calculateRate(Order $order)
    {
        foreach ($this->ratesInstance as $rate) {
            if ($rate->isApplicable($order)) {
                return $this->amountCalc = $rate->apply($this->amountCalc);
            }
        }

        throw new \Exception('Invalid payment method');
    }

    public function specialCalculate(Order $order)
    {
        foreach ($this->specialConditionInstance as $specialCondition) {
            if ($specialCondition->isApplicable($order)) {
                return $this->amountCalc = $specialCondition->apply($this->amountCalc);
            }
        }

        return $this->amountCalc;
    }
}
