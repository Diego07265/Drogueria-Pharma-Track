<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/bd.php';

class Empleado
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require __DIR__ . '/../config/bd.php';
    }

    public function obtenerPorUsuario(string $usuario): ?array
    {
        $sql = "SELECT * FROM empleado WHERE usuario = :usuario LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario' => $usuario]);

        return $stmt->fetch() ?: null;
    }
}
