<?php

declare(strict_types=1);
require_once __DIR__ . '/../config/bd.php';

// Capturar mensaje de la URL si existe
$msg = $_GET['msg'] ?? null;

// Obtener todos los productos
try {
    $stmt = $pdo->query('SELECT * FROM producto ORDER BY producto_id DESC');
    $productos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<div class='container mt-3'><div class='alert alert-danger'>Error al obtener los productos: " . htmlspecialchars($e->getMessage()) . "</div></div>";
    $productos = [];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Droguería Pharma Track - Productos</title>
    <link rel="stylesheet" href="/pharma-track/css/bootstrap.min.css">
    <script src="/pharma-track/js/bootstrap.bundle.min.js"></script>
    <style>
        .fondo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .logo {
            width: 150px;
            filter: drop-shadow(0 0 5px white);
        }

        body,
        html {
            height: 100%;
            margin: 0;
        }
    </style>
</head>

<body class="bg-light">
    <img src="/pharma-track/img/26800.jpg" class="fondo" alt="">

    <!-- Header -->
    <nav class="navbar navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/pharma-track/index.php">
                <img src="/pharma-track/img/Logo.png" class="logo me-2" alt="Logo Pharma Track">
                <strong>Droguería - Gestión de Productos</strong>
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if ($msg): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($msg) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Gestión de Inventario</h5>
                <a href="create.php" class="btn btn-light btn-sm">+ Nuevo Producto</a>
            </div>

            <div class="card-body">
                <?php if (empty($productos)): ?>
                    <div class="alert alert-info">No hay productos disponibles.</div>
                <?php else: ?>
                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Fecha Vencimiento</th>
                                <th scope="col">Receta</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string)$producto['producto_id']) ?></td>
                                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <td><?= htmlspecialchars((string)$producto['categoria_id']) ?></td>
                                    <td>$<?= number_format((float)$producto['precio'], 2, ',', '.') ?></td>
                                    <td><?= htmlspecialchars((string)$producto['stock']) ?></td>
                                    <td><?= htmlspecialchars((string)$producto['fecha_vencimiento']) ?></td>
                                    <td><?= $producto['requiere_receta'] ? 'Sí' : 'No' ?></td>
                                    <td><?= htmlspecialchars((string)$producto['id_proveedor']) ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= urlencode((string)$producto['producto_id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="delete.php?id=<?= urlencode((string)$producto['producto_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <div class="mt-3">
                    <a href="/pharma-track/index.php" class="btn btn-secondary">⬅ Volver al Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
