<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/bd.php';

$producto_id = $_GET['id'] ?? null;

if ($producto_id === null || !is_numeric($producto_id)) {
    header('Location: producto.php?msg=ID inválido');
    exit;
}

try {
    $sql = "DELETE FROM producto WHERE producto_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $producto_id]);

    header('Location: producto.php?msg=Producto eliminado correctamente');
    exit;

} catch (PDOException $e) {
    header('Location: producto.php?msg=Error al eliminar el producto');
    exit;
}
