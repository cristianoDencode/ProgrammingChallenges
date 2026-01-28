<?php

namespace Observer\SolutionV1\Enrollment\EnrollmentEvent;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentEventInterface;

class EnrollmentConfirmedEvent implements EnrollmentEventInterface
{
    public function name(): string
    {
        return 'enrollment.confirmed';
    }
}