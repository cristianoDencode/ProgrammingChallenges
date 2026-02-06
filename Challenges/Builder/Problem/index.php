<?php

declare(strict_types=1);

class OrderService
{
    public function createOrder(array $data): void
    {
        $total = 0;

        foreach ($data['items'] as $item) {
            $total += $item['price'];
        }

        echo "Order created for {$data['customer_name']}" . PHP_EOL;
        echo "<br> Total amount: $ {$total}" . PHP_EOL;

        if ($data['customer_type'] === 'PJ') {
            echo "<br> Issuing INVOICE for {$data['customer_name']}" . PHP_EOL;
        } else {
            echo "<br> Issuing RECEIPT for {$data['customer_name']}" . PHP_EOL;
        }
    }
}

$service = new OrderService();

$service->createOrder([
    'customer_name' => 'Cristiano Souza',
    'customer_type' => 'PJ',
    'items' => [
        ['name' => 'Notebook', 'price' => 3500],
        ['name' => 'Mouse', 'price' => 150],
    ]
]);
