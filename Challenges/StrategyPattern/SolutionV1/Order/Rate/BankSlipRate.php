<?php
namespace APP\SolutionV1\Order\Rate;

class BankSlipRate implements RateInterface
{
    public function apply (float $finalAmount): float
    {
        return $finalAmount += 3;
    }
}