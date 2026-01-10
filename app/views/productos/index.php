<?php
$productos = $productos ?? [];
?>

<!--prueba de commit-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="/pharma-track/css/bootstrap.min.css">
</head>

<body class="container mt-4">

    <h2>Listado de Productos</h2>

    <!-- Mostrar cuando se crea o elimina un producto -->


    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success">
            <?php
            switch ($_GET['msg']) {
                case 'ok':
                    echo "Producto creado correctamente";
                    break;

                case 'deleted':
                    echo "Producto eliminado correctamente";
                    break;

                default:
                    echo "Operación realizada correctamente";
                    break;
            }
            ?>
        </div>
    <?php endif; ?>


    <a href="/pharma-track/public/index.php?controller=producto&action=create"
        class="btn btn-primary mb-3">
        Nuevo Producto
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($productos)): ?>
            
                <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?= (int)$p['producto_id'] ?></td>
                        <td><?= htmlspecialchars($p['nombre']) ?></td>
                        <td><?= number_format((float)$p['precio'], 2) ?></td>
                        <td>
                            <a href="/pharma-track/public/index.php?controller=producto&action=edit&id=<?= (int)$p['producto_id'] ?>"
                                class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <a href="/pharma-track/public/index.php?controller=producto&action=delete&id=<?= (int)$p['producto_id'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que desea eliminar este producto?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay productos registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>

</body>

</html>