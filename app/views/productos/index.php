
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="/pharma-track/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Listado de Productos</h2>

<a href="index.php?action=create" class="btn btn-primary mb-3">
    Nuevo Producto
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nombre']) ?></td>
                <td><?= number_format((float)$p['precio'], 2) ?></td>
                <td>
                    <a href="index.php?action=delete&id=<?= $p['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Seguro que desea eliminar este producto?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
