<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order\OrderFactory;
use Builder\SolutionV1\Order\Order;

class IndividualOrderFactory implements OrderFactoryInterface
{
    private Order $orderData;

    public function __construct(Order $orderData)
    {
        $this->orderData = $orderData;
    }

    public function createOrder(): void
    {
        $total = 0;
        foreach ($this->orderData->getCustomerItems() as $items) {
            $total += $items['price'];
        }
        $this->orderData->setTotalAmount($total);
    }

    public function customerTypeValidation(): bool
    {
        return $this->orderData->getCustomerType() === 'NP';
    }

    public function viewOrder(): void
    {
        echo "Order created for {$this->orderData->getCustomerName()}" . PHP_EOL;
        echo "<br> Total amount: $ {$this->orderData->getTotalAmount()}" . PHP_EOL;
        echo "<br> Issuing RECEIPT for {$this->orderData->getCustomerName()}" . PHP_EOL;
    }
}