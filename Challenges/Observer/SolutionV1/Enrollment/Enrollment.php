<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment;

use Observer\SolutionV1\Enrollment\EnrollmentState\EnrollmentStateInterface;
use Observer\SolutionV1\Enrollment\EnrollmentState\CreatedState;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\EventObserverInterface;


class Enrollment
{
    private string $message;
    private string $subject;
    public function __construct(
        private string $address,
        private string $course,
        private EnrollmentStateInterface $status = new CreatedState(),
        private array $observers = []
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
        $this->message = "";
    }

    public function activate(): void
    {
        $this->status->activated($this);
    }

    public function cancel(): void
    {
        $this->status->cancelled($this);
    }

    public function addObservers(EventObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function notifyObservers():void
    {
        foreach ($this->observers as $observer){
            $observer->update($this->address, $this->message);
        }
    }

    
}
