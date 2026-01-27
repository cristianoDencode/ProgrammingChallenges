<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

class ConfirmedState implements EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be confirmed.');
    }

    public function confirmed(Enrollment $enrollment): void
    {
        $enrollment->setState(new ActiveState());
    }

    public function activated(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be confirmed.');
    }

    public function cancelled(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be confirmed.');
    }
}
