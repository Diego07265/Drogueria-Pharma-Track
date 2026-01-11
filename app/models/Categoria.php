<?php

declare(strict_types=1);

require __DIR__ . "/../../config/bd.php";

class Categoria
{
    private PDO $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Listar todas las categorías

    public function listar(): array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categoria ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una categoría por su ID

    public function obtenerPorId(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT *FROM categoria WHERE categoria_id = :id");
        $stmt->execute([':id' => $id]);

        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        return $categoria ?: null;
    }

    // Guardar una nueva categoría

    public function guardar(array $datos): void
    {
        $sql = "INSERT INTO categoria (nombre,descripcion) VALUES (:nombre, :descripcion)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['nombre' => $datos['nombre'], 'descripcion' => $datos['descripcion']]);
    }

    // Actualizar una categoría existente

    public function actualizar(int $id, array $datos): void
    {
        $sql = "UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE categoria_id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion']
        ]);
    }

    // Eliminar una categoría

    public function eliminar (int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM categoria WHERE categoria_id = :id");
        $stmt->execute([':id' => $id]);
    }
}
