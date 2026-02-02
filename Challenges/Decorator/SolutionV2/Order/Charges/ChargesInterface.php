<?php

declare(strict_types=1);

namespace Decorator\SolutionV2\Order\Charges;

interface ChargesInterface
{
    public function apply(): float;
}
