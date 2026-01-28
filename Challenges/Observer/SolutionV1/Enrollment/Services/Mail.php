<?php

namespace Observer\SolutionV1\Enrollment\Services;

class Mail 
{
    public function dispatcherMail(string $email, string $subject, string $message): void
    {
        echo "[EMAIL] to: { $email} | {$subject} | $message\n <br>";
    }
}