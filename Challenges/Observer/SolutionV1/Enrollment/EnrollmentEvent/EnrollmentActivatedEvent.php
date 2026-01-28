<?php

namespace Observer\SolutionV1\Enrollment\EnrollmentEvent;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentEventInterface;

class EnrollmentActivatedEvent implements EnrollmentEventInterface
{
    public function name(): string
    {
        return 'enrollment.activated';
    }
}