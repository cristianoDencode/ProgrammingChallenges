<?php

declare(strict_types=1);

namespace Builder\SolutionV1\Order;

class Order 
{
    private string $customerName;
    private string $customerType;
    private array $customerItems;
    private float $totalAmount = 0;

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }
    
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): void
    {
        $this->customerName = $customerName;
    }

    public function getCustomerType(): string
    {
        return $this->customerType;
    }

    public function setCustomerType(string $customerType): void
    {
        $this->customerType = $customerType;
    }

    public function getCustomerItems(): array
    {
        return $this->customerItems;
    }

    public function setCustomerItems(array $customerItems): void
    {
        $this->customerItems = $customerItems;
    }
}