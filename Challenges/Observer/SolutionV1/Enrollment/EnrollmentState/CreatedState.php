<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

class CreatedState implements EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void
    {
        $enrollment->setState(new ConfirmedState());
    }

    public function confirmed(Enrollment $enrollment): void
    {
        throw new \Exception('The student must be registered first.');
    }

    public function activated(Enrollment $enrollment): void
    {
        throw new \Exception('The student must be registered first.');
    }

    public function cancelled(Enrollment $enrollment): void
    {
        throw new \Exception('The student must be registered first.');
    }
}
