<?php
namespace APP\SolutionV1\Order\Rate;

class PixRate implements RateInterface
{
    public function apply (float $finalAmount): float
    {
       return $finalAmount -= 5;
    }
}