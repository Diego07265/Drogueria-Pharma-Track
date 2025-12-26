<?php

/**
 * Modelo Producto
 * Maneja la persistencia de datos de productos
 */

declare(strict_types=1);

require_once __DIR__ . '/../../config/bd.php';

class Producto
{
    private PDO $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM producto";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar(array $datos): void
    {
        $sql = "INSERT INTO producto
            (nombre, categoria_id, precio, stock, fecha_vencimiento, requiere_receta, id_proveedor)
            VALUES
            (:nombre, :categoria_id, :precio, :stock, :fecha_vencimiento, :requiere_receta, :id_proveedor)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':nombre' => $datos['nombre'],
            ':categoria_id' => $datos['categoria_id'],
            ':precio' => $datos['precio'],
            ':stock' => $datos['stock'],
            ':fecha_vencimiento' => $datos['fecha_vencimiento'],
            ':requiere_receta' => $datos['requiere_receta'],
            ':id_proveedor' => $datos['id_proveedor']
        ]);
    }

    public function eliminar(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM producto WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
