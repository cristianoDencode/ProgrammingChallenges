<?php
namespace APP\SolutionV1\Order;
use APP\SolutionV1\Order\Discount\DiscountInterface;
use App\SolutionV1\Order\Discount\VipDiscount;
use App\SolutionV1\Order\Discount\EmployeeDiscount;
use APP\SolutionV1\Order\Rate\RateInterface;
use APP\SolutionV1\Order\Rate\PixRate;
use APP\SolutionV1\Order\Rate\CreditCardRate;
use Exception;

class SpecialConditionFactory 
{
    public static function apply(float $amount, DiscountInterface $type, RateInterface $payment) 
    {
        if ($type instanceof VipDiscount
        && $payment instanceof PixRate) {
            return $amount -= 2; 
        }
        
        if ($type instanceof EmployeeDiscount 
        && $payment instanceof CreditCardRate) {
            return $amount += 10;
        }
        
        return round($amount);
    }
}