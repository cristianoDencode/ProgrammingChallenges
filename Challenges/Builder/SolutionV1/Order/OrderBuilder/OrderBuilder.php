<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order\OrderBuilder;
use Builder\SolutionV1\Order\OrderBuilder\OrderBuilderInterface;
use Builder\SolutionV1\Order\Order;

class OrderBuilder implements OrderBuilderInterface
{
    private Order $order;
    private object $data;

    public function __construct(array $data)
    {
        $this->data = (object) $data;
        $this->order = new Order();
        $this->buildCustomer();
        $this->buildItemCustomer();
    }

    public function getOrder():Order
    {
        return $this->order;
    }


    public function buildCustomer():void
    {
        $this->order->setCustomerName($this->data->customer_name);
        $this->order->setCustomerType($this->data->customer_type);
    }

    public function buildItemCustomer():void
    {
        $this->order->setCustomerItems($this->data->items);
    }
}

