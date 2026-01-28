<?php

namespace Observer\SolutionV1\Enrollment\Services;

class Logs 
{
    public function dispatcherLog(string $path, string $message): void
    {
        file_put_contents($path, $message, FILE_APPEND | LOCK_EX);
        echo "[LOG] path: {$path} | {$message}\n <br>";
    }
}