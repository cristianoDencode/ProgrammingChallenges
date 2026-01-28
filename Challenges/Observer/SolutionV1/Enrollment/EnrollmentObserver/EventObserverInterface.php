<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;

use Observer\SolutionV1\Enrollment\Enrollment;

interface EventObserverInterface
{
    public function update(Enrollment $nrollment): void;
}
