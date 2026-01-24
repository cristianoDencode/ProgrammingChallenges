<?php
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

        if ($order->customerType === 'vip') {
            $finalAmount -= $finalAmount * 0.10;
        } elseif ($order->customerType === 'employee') {
            $finalAmount -= $finalAmount * 0.20;
        } elseif ($order->customerType === 'regular') {
            // No discount
        } else {
            throw new Exception('Invalid customer type');
        }

        if ($order->paymentMethod === 'pix') {
            $finalAmount -= 5;
        } elseif ($order->paymentMethod === 'bank_slip') {
            $finalAmount += 3;
        } elseif ($order->paymentMethod === 'credit_card') {
            if ($finalAmount > 100) {
                $finalAmount += $finalAmount * 0.02;
            }
        } else {
            throw new Exception('Invalid payment method');
        }

        if ($order->customerType === 'vip' && $order->paymentMethod === 'pix') {
            $finalAmount -= 2;
        }

        if ($order->customerType === 'employee' && $order->paymentMethod === 'credit_card') {
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
    echo "$" . $calculator->calculate($order) . "<br>";
}