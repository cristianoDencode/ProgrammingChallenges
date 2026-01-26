<?php

declare(strict_types=1);

namespace APP\SolutionV2\Order;

interface OrderInterface
{
    public function getFinalAmount(): float;
}
