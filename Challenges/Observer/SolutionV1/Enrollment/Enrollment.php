<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment;

use Observer\SolutionV1\Enrollment\EnrollmentState\EnrollmentStateInterface;
use Observer\SolutionV1\Enrollment\EnrollmentState\CreatedState;

class Enrollment
{
    public function __construct(
        public string $address,
        public string $course,
        private EnrollmentStateInterface $status = new CreatedState()
    ) {
        $this->status->created($this);
    }

    public function setState(EnrollmentStateInterface $status): void
    {
        $this->status = $status;
    }

    public function confirm(): void
    {
        $this->status->confirmed($this);
    }

    public function activate(): void
    {
        $this->status->activated($this);
    }

    public function cancel(): void
    {
        $this->status->cancelled($this);
    }
}
