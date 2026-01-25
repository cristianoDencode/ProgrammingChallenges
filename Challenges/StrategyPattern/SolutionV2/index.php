<?php
declare(strict_types=1);
namespace APP\SolutionV1;
require_once __DIR__ . '/../../vendor/autoload.php';
use APP\SolutionV2\Order\Order;
use Exception;

try {
    $orders = [
        new Order(150, 'vip', 'pix'),
        new Order(80, 'regular', 'bank_slip'),
        new Order(200, 'employee', 'credit_card'),
        new Order(50, 'vip', 'credit_card'),
    ];

    foreach ($orders as $order) {
        echo "Order ({$order->customerType}, {$order->paymentMethod}) => ";
        echo "$" . $order->getFinalAmount() . "<br>";
    } 

} catch (Exception $e) {
    echo $e->getMessage();
}