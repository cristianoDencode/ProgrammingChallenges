<?php
namespace APP\SolutionV2\Order;
use APP\SolutionV2\Order\OrderCalculator;
use APP\SolutionV2\Order\Discount\VipDiscount;
use APP\SolutionV2\Order\Discount\EmployeeDiscount;
use APP\SolutionV2\Order\Discount\RegularDiscount;

use APP\SolutionV2\Order\Rate\PixRate;
use APP\SolutionV2\Order\Rate\BankSlipRate;
use APP\SolutionV2\Order\Rate\CreditCardRate;

use APP\SolutionV2\Order\SpecialCondition\VipPixSpecial;
use APP\SolutionV2\Order\SpecialCondition\EmployeeCreditCardSpecial;

class Order extends BaseOrder
{
    public function getFinalAmount(): float
    {
        $calculator = new OrderCalculator(); 

        $calculator->addDiscount(new VipDiscount());
        $calculator->addDiscount(new EmployeeDiscount());
        $calculator->addDiscount(new RegularDiscount());

        $calculator->addRate(new PixRate());
        $calculator->addRate(new BankSlipRate());
        $calculator->addRate(new CreditCardRate());

        $calculator->addSpecialCondition(new VipPixSpecial());
        $calculator->addSpecialCondition(new EmployeeCreditCardSpecial());
        
        $calculator->calculateDiscount($this);
        $amount = $calculator->calculateRate($this);
        $amount = $calculator->specialCalculate($this);
        $finalAmount = $this->clampToZero($amount);
        return round($finalAmount);
    }
}