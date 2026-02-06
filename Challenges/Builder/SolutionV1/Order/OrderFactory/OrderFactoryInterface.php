<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order\OrderFactory;
use Builder\SolutionV1\Order\Order;

interface OrderFactoryInterface 
{
    public function createOrder(): void;
    public function customerTypeValidation(): bool;
    public function viewOrder(): void;
}