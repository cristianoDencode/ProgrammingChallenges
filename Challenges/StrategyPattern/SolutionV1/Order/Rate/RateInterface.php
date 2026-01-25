<?php
namespace APP\SolutionV1\Order\Rate;

interface RateInterface 
{
    public function apply(float $amount): float;
}