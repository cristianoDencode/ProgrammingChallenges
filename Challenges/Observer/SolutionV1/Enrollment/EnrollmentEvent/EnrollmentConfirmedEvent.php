<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentEvent;

class EnrollmentConfirmedEvent implements EnrollmentEventInterface
{
    public function name(): string
    {
        return 'enrollment.confirmed';
    }
}
