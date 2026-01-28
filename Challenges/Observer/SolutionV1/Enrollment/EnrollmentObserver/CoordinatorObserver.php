<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;

use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\Services\Mail;

class CoordinatorObserver implements EventObserverInterface
{
    private string $coordinatorMail = 'coord@course.com';

    public function update(Enrollment $enrollment): void
    {
        $email = new Mail();
        $subject = "NOTICE: {$enrollment->course}";
        $message = "Student {$enrollment->address} - {$enrollment->message}";
        $email->dispatcherMail($this->coordinatorMail, $subject, $message);
    }
}
