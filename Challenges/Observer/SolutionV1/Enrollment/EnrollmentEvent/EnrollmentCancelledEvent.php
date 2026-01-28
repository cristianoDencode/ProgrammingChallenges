<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentEvent;

class EnrollmentCancelledEvent implements EnrollmentEventInterface
{
    public function name(): string
    {
        return 'enrollment.cancelled';
    }
}
