<?php

namespace Observer\SolutionV1\Enrollment;
use Observer\SolutionV1\Enrollment\EnrollmentEvent\EnrollmentEventInterface;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\EventObserverInterface;
use Observer\SolutionV1\Enrollment\Enrollment;

class EventDispatcher
{
    private array $listeners = [];

    public function listen(string $eventName, EventObserverInterface $observer): void
    {
        $this->listeners[$eventName][] = $observer;
    }

    public function dispatch(EnrollmentEventInterface $event, Enrollment $enrollment): void
    {
        $eventName = $event->name();

        foreach ($this->listeners[$eventName] ?? [] as $observer) {
            $observer->update($enrollment);
        }
    }
}