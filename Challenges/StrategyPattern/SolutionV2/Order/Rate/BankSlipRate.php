<?php
namespace APP\SolutionV2\Order\Rate;
use APP\SolutionV2\Order\Order;

class BankSlipRate implements RateInterface
{
    public function isApplicable(Order $order): bool 
    {
        return $order->paymentMethod === 'bank_slip';
    }

    public function apply (float $finalAmount): float
    {
        return $finalAmount += 3;
    }
}