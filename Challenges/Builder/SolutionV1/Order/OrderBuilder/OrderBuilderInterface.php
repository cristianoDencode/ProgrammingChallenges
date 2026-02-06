<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order\OrderBuilder;
use Builder\SolutionV1\Order\Order;

interface OrderBuilderInterface 
{
    public function buildCustomer():void;
    public function buildItemCustomer():void;
    public function getOrder():Order;
}