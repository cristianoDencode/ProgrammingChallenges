<?php

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;
use Observer\SolutionV1\Enrollment\Enrollment;

interface EventObserverInterface
{
    public function update(Enrollment $nrollment): void;
}
