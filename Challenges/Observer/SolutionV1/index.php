<?php

declare(strict_types=1);

namespace Observer\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Observer\SolutionV1\Enrollment\Enrollment;

try {
    $enrollment = new Enrollment('student1@email.com', 'Arquitetura de Software');
    $enrollment->confirm();
    $enrollment->activate();
    $enrollment->cancel();
    echo '<br>';
    var_dump($enrollment);
} catch (\Exception $e) {
    echo $e->getMessage();
}
