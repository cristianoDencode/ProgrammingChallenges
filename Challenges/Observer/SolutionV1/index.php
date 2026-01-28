<?php

declare(strict_types=1);

namespace Observer\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\CoordinatorObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\InfrastructureObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\StudentObserver;

try {
    $enrollment = new Enrollment('student1@email.com', 'Arquitetura de Software');
    $enrollment->addObservers(new CoordinatorObserver());
    $enrollment->addObservers(new InfrastructureObserver());
    $enrollment->addObservers(new StudentObserver());
    
    $enrollment->confirm();
    $enrollment->activate();
    $enrollment->cancel();
    echo '<br>';
    var_dump($enrollment);
} catch (\Exception $e) {
    echo $e->getMessage();
}
