<?php

declare(strict_types=1);

namespace APP\Problem;

class Order
{
    public function __construct(
        public float $baseAmount,
        public string $customerType,
        public string $paymentMethod
    ) {}
}

class OrderCalculator
{
    /**
     * @throws Exception
     */
    public function calculate(Order $order): float
    {
        $finalAmount = $order->baseAmount;

        if ('vip' === $order->customerType) {
            $finalAmount -= $finalAmount * 0.10;
        } elseif ('employee' === $order->customerType) {
            $finalAmount -= $finalAmount * 0.20;
        } elseif ('regular' === $order->customerType) {
            // No discount
        } else {
            throw new Exception('Invalid customer type');
        }

        if ('pix' === $order->paymentMethod) {
            $finalAmount -= 5;
        } elseif ('bank_slip' === $order->paymentMethod) {
            $finalAmount += 3;
        } elseif ('credit_card' === $order->paymentMethod) {
            if ($finalAmount > 100) {
                $finalAmount += $finalAmount * 0.02;
            }
        } else {
            throw new Exception('Invalid payment method');
        }

        if ('vip' === $order->customerType && 'pix' === $order->paymentMethod) {
            $finalAmount -= 2;
        }

        if ('employee' === $order->customerType && 'credit_card' === $order->paymentMethod) {
            $finalAmount += 10;
        }

        if ($finalAmount < 0) {
            $finalAmount = 0;
        }

        return round($finalAmount, 2);
    }
}

$orders = [
    new Order(150, 'vip', 'pix'),
    new Order(80, 'regular', 'bank_slip'),
    new Order(200, 'employee', 'credit_card'),
    new Order(50, 'vip', 'credit_card'),
];

$calculator = new OrderCalculator();

foreach ($orders as $order) {
    echo "Order ({$order->customerType}, {$order->paymentMethod}) => ";
    echo '$'.$calculator->calculate($order).'<br>';
}
