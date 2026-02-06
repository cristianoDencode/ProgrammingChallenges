<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order;

use Builder\SolutionV1\Order\OrderBuilder\OrderBuilder;
use Builder\SolutionV1\Order\OrderFactory\OrderFactoryManager;
use Builder\SolutionV1\Order\OrderFactory\CompanyOrderFactory;
use Builder\SolutionV1\Order\OrderFactory\IndividualOrderFactory;

class OrderFacade
{
    public function processOrder(array $item)
    {
        $order = (new OrderBuilder($item))->getOrder();
        $factory = new OrderFactoryManager();
        $factory->addFactory(new CompanyOrderFactory($order));
        $factory->addFactory(new IndividualOrderFactory($order));
        $orderFactory = $factory->getFactory();
        $orderFactory->createOrder();
        $orderFactory->viewOrder();
    } 
}