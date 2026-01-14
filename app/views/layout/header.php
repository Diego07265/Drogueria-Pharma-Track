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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">
                Pharma Track
            </span>

            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['empleado'])): ?>
                    <span class="text-white me-3">
                        Usuario: <?= htmlspecialchars($_SESSION['empleado']['usuario']) ?>
                    </span>

                    <a href="/pharma-track/public/index.php?controller=auth&action=logout"
                        class="btn btn-outline-light btn-sm">
                        Cerrar sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Contenedor principal -->
    <div class="container mt-4">