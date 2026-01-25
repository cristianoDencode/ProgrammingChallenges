<?php
namespace APP\SolutionV2\Order\Rate;
use APP\SolutionV2\Order\Order;

class PixRate implements RateInterface
{
    public function isApplicable(Order $order): bool 
    {
        return $order->paymentMethod === 'pix';
    }

    public function apply (float $finalAmount): float
    {
       return $finalAmount -= 5;
    }
} 