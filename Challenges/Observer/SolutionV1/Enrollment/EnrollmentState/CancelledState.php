<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

class CancelledState implements EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void
    {
        throw new \Exception('The student is activated.');
    }

    public function confirmed(Enrollment $enrollment): void
    {
        throw new \Exception('The student is activated.');
    }

    public function activated(Enrollment $enrollment): void
    {
        throw new \Exception('The student is activated.');

    }

    public function cancelled(Enrollment $enrollment): void
    {
        $enrollment->setState(new EndState());
    }
}
