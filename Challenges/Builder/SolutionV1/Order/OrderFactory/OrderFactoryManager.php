<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order\OrderFactory;
 
class OrderFactoryManager 
{
    private array $factories = [];
    
    public function addFactory(OrderFactoryInterface $factory): void
    {
        $this->factories[] = $factory;
    }
    
    public function getFactory(): OrderFactoryInterface
    {
        foreach ($this->factories as $factory) {
            if ($factory->customerTypeValidation()) {
                return $factory;
            }
        }
        
        throw new \InvalidArgumentException("No factory found for customer type!");
    }
}