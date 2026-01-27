<?php
$producto = $productos ?? [];
require_once __DIR__ . '/../layout/header.php';
?>

<div class="container mt-4">
    <h2 class="mb-3">Inventario</h2>

    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Stock</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= (int)$p['producto_id'] ?></td>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td><?= (int)$p['stock'] ?></td>
                    <td>
                        <?php if ($p['stock'] <= 5): ?>
                        <span class="badge bg-danger">Bajo</span>
                        <?php else: ?>
                        <span class="badge bg-success">OK</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ .'/../layout/footer.php'; ?>

