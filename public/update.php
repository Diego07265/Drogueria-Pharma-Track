<?php

declare(strict_types=1);
require_once __DIR__ . '/../config/bd.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: producto.php');
    exit;
}

try {
    // Recibir datos del formulario
    $producto_id = (int)($_POST['producto_id'] ?? 0);
    $nombre = trim($_POST['nombre'] ?? '');
    $categoria_id = (int)($_POST['categoria_id'] ?? 0);
    $precio = (float)($_POST['precio'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $fecha_vencimiento = !empty($_POST['fecha_vencimiento'])
        ? $_POST['fecha_vencimiento']
        : null;
    $requiere_receta = isset($_POST['requiere_receta']) ? 1 : 0;
    $id_proveedor = (int)($_POST['id_proveedor'] ?? 0);

    // Validar campos obligatorios
    if ($producto_id <= 0 || $nombre === '' || $categoria_id <= 0 || $precio <= 0 || $stock < 0 || $id_proveedor <= 0) {
        header('Location: producto.php?msg=Datos inválidos');
        exit;
    }

    // Preparar la consulta UPDATE
    $sql = "UPDATE producto SET
                nombre = :nombre,
                categoria_id = :categoria_id,
                precio = :precio,
                stock = :stock,
                fecha_vencimiento = :fecha_vencimiento,
                requiere_receta = :requiere_receta,
                id_proveedor = :id_proveedor
            WHERE producto_id = :producto_id";

    $stmt = $pdo->prepare($sql);

    // Ejecutar la actualización
    $stmt->execute([
        ':nombre' => $nombre,
        ':categoria_id' => $categoria_id,
        ':precio' => $precio,
        ':stock' => $stock,
        ':fecha_vencimiento' => $fecha_vencimiento,
        ':requiere_receta' => $requiere_receta,
        ':id_proveedor' => $id_proveedor,
        ':producto_id' => $producto_id
    ]);

    // Redirigir al listado de productos con mensaje 
    header('Location: producto.php?msg=Producto actualizado correctamente');
    exit;
} catch (Exception $e) {
    echo "Error al actualizar el producto: " . htmlspecialchars($e->getMessage());
}
