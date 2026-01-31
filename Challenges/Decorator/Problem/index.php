<?php

declare(strict_types=1);

$baseOrderValue = 85.00;

$hasDeliveryFee = true;
$hasPremiumPackaging = true;
$tipAmount = 10.00;
$isLoyalCustomer = true;
$couponCode = 'FOOD10';
$isNightTime = true;

$total = $baseOrderValue;

if ($hasDeliveryFee) {
    $total += 12.00;
}

if ($hasPremiumPackaging) {
    $total += 5.00;
}

if ($tipAmount > 0) {
    $total += $tipAmount;
}

if (null !== $couponCode) {
    if ('FOOD10' === $couponCode) {
        $total -= 10;
    } elseif ('FOOD20' === $couponCode) {
        $total -= 20;
    }
}

if ($isLoyalCustomer) {
    $total -= ($total * 0.05);
}

if ($isNightTime) {
    $total += 8.00;
}

if ($total < 0) {
    $total = 0;
}

echo 'Order Summary';
echo '<br>';
echo 'Base order value: $ '.number_format($baseOrderValue, 2, '.', ',');
echo '<br>';
echo 'Total to pay: $ '.number_format($total, 2, '.', ',');
