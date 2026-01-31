<?php

declare(strict_types=1);

namespace Decorator\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Decorator\SolutionV1\Order\Facade\OrderFacade;
use Decorator\SolutionV1\Order\OrderDto\OrderDto;

$orderData  = new OrderDto();
$orderData->baseOrderValue = 85.00;
$orderData->hasDeliveryFee = true;
$orderData->hasPremiumPackaging = true;
$orderData->tipAmount = 10.00;
$orderData->isLoyalCustomer = true;
$orderData->couponCode = 'FOOD10';
$orderData->isNightTime = true;


$total = new OrderFacade();
$total = $total->process($orderData);

echo 'Order Summary';
echo '<br>';
echo 'Base order value: $ '.number_format($orderData->baseOrderValue, 2, '.', ',');
echo '<br>';
echo 'Total to pay: $ '.number_format($total, 2, '.', ',');
