<?php

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\EventObserverInterface;
use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\Services\Mail;

class StudentObserver implements EventObserverInterface
{
    public function update(Enrollment $enrollment): void
    {
        $email = new Mail();
        $subject = "INFORMATION: {$enrollment->course}";
        $message = "Student {$enrollment->address} - {$enrollment->message}";
        $email->dispatcherMail($enrollment->address, $subject, $message);
    }
}