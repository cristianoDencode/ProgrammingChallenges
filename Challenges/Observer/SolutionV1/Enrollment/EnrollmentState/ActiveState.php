<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

class ActiveState implements EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be activated.');
    }

    public function confirmed(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be activated.');
    }

    public function activated(Enrollment $enrollment): void
    {
        $enrollment->setState(new CancelledState());
    }

    public function cancelled(Enrollment $enrollment): void
    {
        throw new \Exception('The student registration must be activated.');
    }
}
