<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment;

use Observer\SolutionV1\Enrollment\EnrollmentState\EnrollmentStateInterface;
use Observer\SolutionV1\Enrollment\EnrollmentState\CreatedState;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentConfirmedEvent;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentActivatedEvent;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentCancelledEvent;

class Enrollment
{
    public string $message;

    public function __construct(
        public string $address,
        public string $course,
        private EventDispatcher $dispatcher,
        private $status = new CreatedState()
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
        $this->message = 'Confirmed registration!';
        $this->dispatcher->dispatch(
            new EnrollmentConfirmedEvent(),
            $this
        );
    }

    public function activate(): void
    {
        $this->status->activated($this);
        $this->message = 'Active registration!';
        $this->dispatcher->dispatch(
            new EnrollmentActivatedEvent(),
            $this
        );
    }

    public function cancel(): void
    {
        $this->status->cancelled($this);
        $this->message = 'Cancelled registration!';
        $this->dispatcher->dispatch(
            new EnrollmentCancelledEvent(),
            $this
        );
    }
}
