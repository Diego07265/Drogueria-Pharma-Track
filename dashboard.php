<?php

declare(strict_types=1);
require_once __DIR__ . '/config/bd.php';

// 1 Consulta: Total de productos

try {
    $stmtTotal = $pdo->query("SELECT COUNT(*) FROM producto");
    $totalProductos = (int)$stmtTotal->fetchColumn();
} catch (PDOException $e) {
    $totalProductos = 0; //valor seguro si falla la consulta
}
// 2 Consulta: Productos con stock bajo (<=10)
try {
    $stmtStock = $pdo->query("SELECT COUNT(*) FROM producto WHERE stock <= 10");
    $stockBajo = (int)$stmtStock->fetchColumn();
} catch (PDOException $e) {
    $stockBajo = 0; //valor seguro si falla la consulta
}
// 3 Consulta: Productos que requieren receta
try {
    $stmtReceta = $pdo->query("SELECT COUNT(*)FROM producto WHERE requiere_receta = 1");
    $conReceta = (int)$stmtReceta->fetchColumn();
} catch (PDOException $e) {
    $conReceta = 0;
}
// 4 Consulta: Productos próximos a vencer (30 días)

try {
    $stmtVencer = $pdo->query("
        SELECT COUNT(*) 
        FROM producto 
        WHERE fecha_vencimiento IS NOT NULL
          AND fecha_vencimiento BETWEEN CURDATE() 
          AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)
    ");
    $proximosVencer = (int)$stmtVencer->fetchColumn();
} catch (PDOException $e) {
    $proximosVencer = 0;
}
$claseStock = $stockBajo > 0 ? 'border-danger' : 'border-success';
$claseVencer = $proximosVencer > 0 ? 'border-warning' : 'border-success';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pharma Track</title>

    <!-- Bootstrap -->
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
            width: 140px;
            filter: drop-shadow(0 0 5px white);
        }

        .card {
            border-radius: 1rem;
        }
    </style>
</head>

<body class="bg-light">
    <img src="/pharma-track/img/26800.jpg" class="fondo" alt="fondo">

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/pharma-track/img/logo.png" class="logo me-2" alt="logo">
                <strong>Pharma Track | Dashboard</strong>
            </a>
            <a href="index.php" class="btn btn-outline-light">Cerrar sesión</a>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container mt-5">

        <!--tarjetas KPI-->
        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h6 class="text-muted">Total Productos</h6>
                        <h2 class="fw-bold"><?= $totalProductos ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-center <?= $claseStock ?>">
                    <div class="card-body">
                        <h6 class="text-muted">Stock Bajo</h6>
                        <h2 class="fw-bold"><?= $stockBajo ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h6 class="text-muted">Con Recetas</h6>
                        <h2 class="fw-bold"><?= $conReceta ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-center <?= $claseVencer ?>">
                    <div class="card-body">
                        <h6 class="text-muted">Próx. a Vencer</h6>
                        <h2 class="fw-bold"><?= $proximosVencer ?></h2>
                    </div>
                </div>
            </div>

        </div>

        <!--Accesos Rapidos-->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Accesos Rápidos
            </div>
            <div class="card-body">
                <div class="d-flex gap-3 flex-wrap">
                    <a href="/pharma-track/public/producto.php" class="btn btn-outline-primary">
                        Inventario (Productos)
                    </a>
                    <a href="/pharma-track/public/create.php" class="btn btn-outline-success">Agregar Producto</a>
                    <a href="#" class="btn btn-outline-secondary">
                        Categorias
                    </a>
                    <a href="/pharma-track/pages/providers/providers.html" class="btn btn-outline-warning">
                        Proveedores
                    </a>
                </div>
            </div>

        </div>


</body>

</html>