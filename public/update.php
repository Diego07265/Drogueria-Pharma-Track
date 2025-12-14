<?php
declare(strict_types=1);
require_once __DIR__ . '/../config/bd.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: producto.php');
    exit;
}

try {
    $producto_id = (int)($_POST['producto_id'] ?? 0);
    $nombre = trim($_POST['nombre'] ?? '');
    $categoria_id = (int)($_POST['categoria_id'] ?? 0);
    $precio = (float)($_POST['precio'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $fecha_vencimiento = !empty($_POST['fecha_vencimiento']) ? $_POST['fecha_vencimiento'] : null;
    $requiere_receta = isset($_POST['requiere_receta']) ? 1 : 0;
    $id_proveedor = (int)($_POST['id_proveedor'] ?? 0);

    if ($producto_id <= 0 || $nombre === '' || $categoria_id <= 0 || $precio <= 0 || $stock < 0) {
        header('Location: producto.php?msg=Datos inválidos');
        exit;
    }

    $stmt = $pdo->prepare(
        "UPDATE producto SET
            nombre = :nombre,
            categoria_id = :categoria_id,
            precio = :precio,
            stock = :stock,
            fecha_vencimiento = :fecha_vencimiento,
            requiere_receta = :requiere_receta,
            id_proveedor = :id_proveedor
         WHERE producto_id = :producto_id"
    );

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

    if ($stmt->rowCount() === 0) {
        header('Location: producto.php?msg=No se realizaron cambios');
        exit;
    }

    header('Location: producto.php?msg=Producto actualizado correctamente');
    exit;

} catch (PDOException $e) {
    error_log($e->getMessage());
    header('Location: producto.php?msg=Error al actualizar el producto');
    exit;
}
