<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\EventObserverInterface;

class InfrastructureObserver implements EventObserverInterface
{
    public function update(string $email, string $body): void   
    {
        
    }
}
