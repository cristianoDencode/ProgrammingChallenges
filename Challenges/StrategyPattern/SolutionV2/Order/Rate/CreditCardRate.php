<?php
namespace APP\SolutionV2\Order\Rate;
use APP\SolutionV2\Order\Order;

class CreditCardRate implements RateInterface
{
    public function isApplicable(Order $order): bool 
    {
        return $order->paymentMethod === 'credit_card';
    }
    
    public function apply (float $finalAmount): float
    {
        if ($finalAmount > 100) {
            $finalAmount += $finalAmount * 0.02;
        }
        return $finalAmount;
    }
}