<?php

declare(strict_types=1);

namespace Observer\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\CoordinatorObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\InfrastructureObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\StudentObserver;
use Observer\SolutionV1\Enrollment\EventDispatcher;

try {
   
    $dispatcher = new EventDispatcher();
    $dispatcher->listen(
        'enrollment.confirmed',
        new StudentObserver()
    );
    $dispatcher->listen(
        'enrollment.confirmed',
        new InfrastructureObserver()
    );

    $dispatcher->listen(
        'enrollment.activated',
        new CoordinatorObserver()
    );
    $dispatcher->listen(
        'enrollment.activated',
        new StudentObserver()
    );

    $dispatcher->listen(
        'enrollment.cancelled',
        new CoordinatorObserver()
    );
    $dispatcher->listen(
        'enrollment.cancelled',
        new StudentObserver()
    );

    $enrollment = new Enrollment('student1@email.com', 'Arquitetura de Software', $dispatcher);
    $enrollment->confirm();
    $enrollment->activate();
    $enrollment->cancel();
    // echo '<br>';
    // var_dump($enrollment);
} catch (\Exception $e) {
    echo $e->getMessage();
}
