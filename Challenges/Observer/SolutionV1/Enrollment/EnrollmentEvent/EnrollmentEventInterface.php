<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentEvent;

interface EnrollmentEventInterface
{
    public function name(): string;
}
