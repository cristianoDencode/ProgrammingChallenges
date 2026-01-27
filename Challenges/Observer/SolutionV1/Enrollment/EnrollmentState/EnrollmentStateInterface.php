<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

interface EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void;

    public function confirmed(Enrollment $enrollment): void;

    public function activated(Enrollment $enrollment): void;

    public function cancelled(Enrollment $enrollment): void;
}
