<?php
$categorias = $categorias ?? [];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link rel="stylesheet" href="/pharma-track/assets/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background-image: url("/pharma-track/assets/img/26800.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Caja blanca para que el contenido se lea */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
        }

        .logo {
            width: 150px;
        }
    </style>
</head>

<body class="container mt-4">
    <h2>Listado de Categorías</h2>

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

    <a href="/pharma-track/public/index.php?controller=categoria&action=create"
        class="btn btn-primary mb-3">
        Nueva Categoría
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $c): ?>
                    <tr>
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
                    <td colspan="3">No hay categorías registradas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>