<?php
namespace APP\SolutionV1\Order;
use App\SolutionV1\Order\Rate\PixRate;
use App\SolutionV1\Order\Rate\BankSlipRate;
use App\SolutionV1\Order\Rate\CreditCardRate;
use App\SolutionV1\Order\Rate\RateInterface;
use Exception;

class RateFactory {
    public static function make(string $type): RateInterface {
        return match ($type) {
            'pix' => new PixRate(),
            'bank_slip' => new BankSlipRate(),
            'credit_card' => new CreditCardRate(),
            default => throw new Exception("Invalid payment method")
        };
    }
}