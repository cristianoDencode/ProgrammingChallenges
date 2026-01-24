<?php
declare(strict_types=1);
namespace APP\SolutionV1;
require_once __DIR__ . '/../../vendor/autoload.php';
use APP\SolutionV1\Order\Order;
use APP\SolutionV1\Order\DiscountFactory;
use APP\SolutionV1\Order\RateFactory;
use Exception;

try {
    $aOrders = [
        ['amount' => 150, 'customerType' => 'vip', 'paymentMethod' => 'pix'],
        ['amount' => 80, 'customerType' => 'regular', 'paymentMethod' => 'bank_slip'],
        ['amount' => 200, 'customerType' => 'employee', 'paymentMethod' => 'credit_card'],
        ['amount' => 50, 'customerType' => 'vip', 'paymentMethod' => 'credit_card']
    ];

    foreach ($aOrders as $order) {
        $objOrder = (object) $order;
        $amount = $objOrder->amount;
        $customerType = $objOrder->customerType;
        $paymentMethod = $objOrder->paymentMethod;

        if($amount <= 0){
            throw new Exception("the amount must be greater than 0");
        }

        if(empty($customerType) || empty($paymentMethod)){
            throw new Exception("Customer type or payment method Invalid!");
        }

        $discount = DiscountFactory::make($customerType);
        $rate = RateFactory::make($paymentMethod);
        $ordersInstance = new Order($amount, $discount, $rate);

        echo "Order ({$customerType}, {$paymentMethod}) => ";
        echo "$" . $ordersInstance->calculate() . "<br>";
    }   

} catch (Exception $e) {
    echo $e->getMessage();
}