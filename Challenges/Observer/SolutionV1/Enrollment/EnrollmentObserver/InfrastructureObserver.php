<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\EnrollmentObserver;

use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\Services\Logs;

class InfrastructureObserver implements EventObserverInterface
{
    public function update(Enrollment $enrollment): void
    {
        $fileName = 'log_'.date('Y-m-d').'.log';
        $directory = 'Storage/Logs';
        if (!is_dir($directory)) {
            mkdir($directory, 0o777, true);
        }

        $path = "{$directory}/{$fileName}";
        $now = new \DateTime();
        $timestamp = $now->format('d-m-Y H:i:s.v');
        $message = "[{$timestamp}]: {$enrollment->address} - {$enrollment->message}".PHP_EOL;

        $log = new Logs();
        $log->dispatcherLog($path, $message);
    }
}
