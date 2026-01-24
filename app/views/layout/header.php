<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pharma Track</title>
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

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="/pharma-track/public/index.php?controller=dashboard&action=index">Pharma Track</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="/pharma-track/public/index.php?controller=dashboard&action=index">Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pharma-track/public/index.php?controller=producto&action=index">Productos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pharma-track/public/index.php?controller=categoria&action=index">Categorias
                        </a>
                    </li>

                </ul>

                <?php if (isset($_SESSION['empleado'])): ?>
                    <span class="navbar-text text-white me-3">
                        <?= htmlspecialchars($_SESSION['empleado']['usuario']) ?>
                    </span>

                    <a href="/pharma-track/public/index.php?controller=auth&action=logout" class="btn btn-outline-light btn-sm">
                        Cerrar sesión
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </nav>