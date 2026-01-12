<?php

/**
 * Modelo Producto
 * Maneja la persistencia de datos de productos
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/bd.php';

class Producto
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require __DIR__ . '/../config/bd.php';
    }

    public function listar(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM producto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "DELETE FROM producto WHERE producto_id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':id' => $id]);
    }

    public function obtenerPorId(int $id): ?array
    {
        $sql = "SELECT * FROM producto WHERE producto_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto ?: null;
    }

    public function actualizar(int $id, array $datos): void
    {
        $sql = "UPDATE producto SET
        nombre = :nombre,
        categoria_id = :categoria_id,
        precio = :precio,
        stock = :stock,
        fecha_vencimiento = :fecha_vencimiento,
        requiere_receta = :requiere_receta,
        id_proveedor = :id_proveedor
        WHERE producto_id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':nombre' => $datos['nombre'],
            ':categoria_id' => $datos['categoria_id'],
            ':precio' => $datos['precio'],
            ':stock' => $datos['stock'],
            ':fecha_vencimiento' => $datos['fecha_vencimiento'],
            ':requiere_receta' => $datos['requiere_receta'],
            ':id_proveedor' => $datos['id_proveedor'],
            ':id' => $id
        ]);
    }
}
