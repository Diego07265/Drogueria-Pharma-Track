<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/pharma-track/css/bootstrap.min.css">
    <script src="/pharma-track/js/bootstrap.bundle.min.js"></script>

    <title>Agregar Producto - Pharma Track</title>
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
    </style>
</head>

<body class="bg-light">
    <img src="/pharma-track/img/26800.jpg" class="fondo" alt="Fondo">
    <!-- Header -->
    <nav class="navbar navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/pharma-track/index.php">
                <img src="/pharma-track/img/Logo.png" class="logo me-2">
                <strong>Droguería - Gestión de Productos</strong>
            </a>
        </div>
    </nav>
    <!-- Main Content -->

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Registrar Nuevo Producto</h5>
            </div>
        
        <div class="card-body">
            <form action="index.php?action=store" method="post">



                <!-- Aquí van los campos del formulario -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categoría</label>
                        <input type="number" name="categoria_id" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Precio</label>
                        <input type="number" name="precio" class="form-control" step="0.01" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ID Proveedor</label>
                        <input type="number" name="id_proveedor" class="form-control">
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="requiere_receta" value="1">
                    <label class="form-check-label">
                        Requiere receta médica
                    </label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">
                        ⬅ Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">Guardar Producto</button>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>

</html>