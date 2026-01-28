<?php

declare(strict_types=1);

namespace Observer\SolutionV1;

require_once __DIR__.'/../../vendor/autoload.php';
use Observer\SolutionV1\Enrollment\Enrollment;
use Observer\SolutionV1\Enrollment\Facade\RegisterDispatcher;

try {
    $dispatcher = RegisterDispatcher::register();
    $registers = [['student' => 'student1@email.com', 'course' => 'Software Architecture'], ['student' => 'student2@email.com', 'course' => 'Software Architecture'], ['student' => 'student3@email.com', 'course' => 'Software Architecture'], ['student' => 'student4@email.com', 'course' => 'Software Architecture'], ['student' => 'student5@email.com', 'course' => 'Software Architecture'],
    ];
    $total = count($registers);
    $count = 1;
    foreach ($registers as $register) {
        $register = (object) $register;
        $enrollment = new Enrollment($register->student, $register->course, $dispatcher);
        $enrollment->confirm();
        $enrollment->activate();
        echo '<br>';
        echo '<hr>';
        echo '<br>';
        if ($total == $count) {
            echo '<br>';
            $enrollment->cancel();
        }
        ++$count;
    }

} catch (\Exception $e) {
    echo $e->getMessage();
}
