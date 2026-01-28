<?php

declare(strict_types=1);

class Enrollment
{
    public $status;
    public $studentEmail;
    public $courseName;

    public function __construct($studentEmail, $courseName)
    {
        $this->status = 'created';
        $this->studentEmail = $studentEmail;
        $this->courseName = $courseName;
    }

    public function sendEmail($to, $subject, $message): void
    {
        echo "[EMAIL] to: {$to} | {$subject} | {$message}\n";
    }

    public function confirm(): void
    {
        if ('created' == $this->status) {
            $this->status = 'confirmed';

            echo "Enrollment confirmed.\n";
            echo '<br>';
            $this->sendEmail($this->studentEmail, $this->courseName, 'Enrollment confirmed.');
            echo '<br>';
            file_put_contents('log.txt', "Confirmed: {$this->studentEmail}\n", FILE_APPEND);
            echo 'LOG - OK';
            echo '<br>';

        } else {
            echo "The student must be registered.\n";
        }
    }

    public function activate(): void
    {
        if ('confirmed' == $this->status) {
            $this->status = 'active';

            echo "Course started.\n";
            echo '<br>';
            $this->sendEmail($this->studentEmail, $this->courseName, 'Course started.');
            echo '<br>';
            $this->sendEmail('coord@course.com', $this->courseName, $this->studentEmail.': Student activated');

        } else {
            echo "The student registration must be confirmed.\n";
        }
    }

    public function cancel(): void
    {
        if ('created' == $this->status
        || 'confirmed' == $this->status
        || 'active' == $this->status) {
            $this->status = 'cancelled';

            echo "Matrícula cancelada\n";
            echo '<br>';
            $this->sendEmail($this->studentEmail, $this->courseName, 'Enrollment canceled');
            echo '<br>';
            $this->sendEmail('coord@course.com', $this->courseName, $this->studentEmail.': Enrollment canceled');
        } else {
            echo "The student cannot be canceled.\n";
        }
    }
}

$registers = [['student' => 'student1@email.com', 'course' => 'Software Architecture'], ['student' => 'student2@email.com', 'course' => 'Software Architecture'], ['student' => 'student3@email.com', 'course' => 'Software Architecture'], ['student' => 'student4@email.com', 'course' => 'Software Architecture'], ['student' => 'student5@email.com', 'course' => 'Software Architecture'],
];
$total = count($registers);
$count = 1;
foreach ($registers as $register) {
    $register = (object) $register;
    $enrollment = new Enrollment($register->student, $register->course);
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
