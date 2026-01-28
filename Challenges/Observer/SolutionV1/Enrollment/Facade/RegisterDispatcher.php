<?php

declare(strict_types=1);

namespace Observer\SolutionV1\Enrollment\Facade;

use Observer\SolutionV1\Enrollment\EventDispatcher;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\CoordinatorObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\InfrastructureObserver;
use Observer\SolutionV1\Enrollment\EnrollmentObserver\StudentObserver;

class RegisterDispatcher
{
    public static function register()
    {
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

        return $dispatcher;
    }    
}