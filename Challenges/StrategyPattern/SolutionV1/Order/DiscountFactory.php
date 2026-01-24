<?php
namespace APP\SolutionV1\Order;
use App\SolutionV1\Order\Discount\VipDiscount;
use App\SolutionV1\Order\Discount\EmployeeDiscount;
use App\SolutionV1\Order\Discount\RegularDiscount;
use App\SolutionV1\Order\Discount\DiscountInterface;
use Exception;

class DiscountFactory {
    public static function make(string $type): DiscountInterface {
        return match ($type) {
            'vip' => new VipDiscount(),
            'employee' => new EmployeeDiscount(),
            'regular' => new RegularDiscount(),
            default => throw new Exception("Invalid customer type")
        };
    }
}