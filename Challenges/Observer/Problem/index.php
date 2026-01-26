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
        echo "[EMAIL] Para: {$to} | {$subject}\n";
    }

    public function confirm(): void
    {
        if ('created' == $this->status) {
            $this->status = 'confirmed';

            echo "Matrícula confirmada\n";
            echo '<br>';
            $this->sendEmail($this->studentEmail, 'Matrícula confirmada', '...');
            echo '<br>';
            file_put_contents('log.txt', "CONFIRMADO: {$this->studentEmail}\n", FILE_APPEND);

        } else {
            echo "Não pode confirmar nesse estado\n";
        }
    }

    public function activate(): void
    {
        if ('confirmed' == $this->status) {
            $this->status = 'active';

            echo "Curso iniciado\n";
            echo '<br>';
            $this->sendEmail($this->studentEmail, 'Curso iniciado', $this->studentEmail.' iniciou o curso');
            echo '<br>';
            $this->sendEmail('coord@escola.com', 'Aluno ativo', $this->studentEmail.' iniciou o curso');

        } else {
            echo "Não pode ativar\n";
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
            $this->sendEmail($this->studentEmail, 'Matrícula cancelada', 'Sua matrícula foi cancelada');
            echo '<br>';
            $this->sendEmail('coord@escola.com', 'Cancelamento', 'Aluno cancelou matrícula');
        } else {
            echo "Não pode cancelar\n";
        }
    }
}

$matriculas = [['aluno' => 'aluno1@email.com', 'curso' => 'Arquitetura de Software'], ['aluno' => 'aluno2@email.com', 'curso' => 'Arquitetura de Software'], ['aluno' => 'aluno3@email.com', 'curso' => 'Arquitetura de Software'], ['aluno' => 'aluno4@email.com', 'curso' => 'Arquitetura de Software'], ['aluno' => 'aluno5@email.com', 'curso' => 'Arquitetura de Software'],
];
$totalRegistro = count($matriculas);
$count = 1;
foreach ($matriculas as $matricula) {
    $registro = (object) $matricula;
    $enrollment = new Enrollment($registro->aluno, $registro->curso);
    $enrollment->confirm();
    $enrollment->activate();
    echo '<br>';
    echo '<hr>';
    echo '<br>';
    if ($totalRegistro == $count) {
        echo '<br>';
        $enrollment->cancel();
    }
    ++$count;
}
