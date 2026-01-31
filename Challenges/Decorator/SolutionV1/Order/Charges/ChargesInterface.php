<?php

declare(strict_types=1);

namespace Decorator\SolutionV1\Order\Charges;

interface ChargesInterface
{
    public function apply(): float;
}
