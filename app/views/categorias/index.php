<?php
$categorias = $categorias ?? [];
require_once __DIR__ . '/../layout/header.php';
?>

<h2 class="mb-3">Listado de Categorías</h2>

<a href="/pharma-track/public/index.php?controller=categoria&action=create"
    class="btn btn-primary mb-3">
    Nueva Categoría
</a>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?php
        echo match ($_GET['msg']) {
            'ok' => 'Categoría creada correctamente',
            'updated' => 'Categoría actualizada correctamente',
            'deleted' => 'Categoría eliminada correctamente',
            default => 'Operación realizada'
        };
        ?>
    </div>
<?php endif; ?>



<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($categorias)): ?>
            <?php foreach ($categorias as $c): ?>
                <tr>
                    <td><?= (int)$c['categoria_id'] ?></td>
                    <td><?= htmlspecialchars($c['nombre']) ?></td>
                    <td><?= htmlspecialchars($c['descripcion'] ?? '') ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                            href="/pharma-track/public/index.php?controller=categoria&action=edit&id=<?= (int)$c['categoria_id'] ?>">
                            Editar
                        </a>

                        <a class="btn btn-danger btn-sm"
                            href="/pharma-track/public/index.php?controller=categoria&action=delete&id=<?= (int)$c['categoria_id'] ?>"
                            onclick="return confirm('¿Eliminar esta categoría?')">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay categorías registradas</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
