<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentState;

use Observer\SolutionV1\Enrollment\Enrollment;

class EndState implements EnrollmentStateInterface
{
    public function created(Enrollment $enrollment): void
    {
        throw new \Exception('The student was canceled.');
    }

    public function confirmed(Enrollment $enrollment): void
    {
        throw new \Exception('The student was canceled.');
    }

    public function activated(Enrollment $enrollment): void
    {
        throw new \Exception('The student was canceled.');

    }

    public function cancelled(Enrollment $enrollment): void
    {
        throw new \Exception('The student was canceled.');
    }
}
