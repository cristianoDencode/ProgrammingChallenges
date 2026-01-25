<?php

namespace APP\SolutionV2\Order;

interface OrderInterface
{
    public function getFinalAmount(): float;
}
