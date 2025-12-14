<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Droguería Pharma Track</title>

    <!-- Bootstrap global -->
    <link rel="stylesheet" href="/pharma-track/css/bootstrap.min.css">
    <script src="/pharma-track/js/bootstrap.bundle.min.js"></script>

    <!-- JS propio -->
    <!--<script src="formulario.js"></script>-->

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

    <!-- Fondo -->
    <img src="img/26800.jpg" class="fondo" alt="Fondo">

    <!-- LOGIN -->
    <div class="container vh-100 d-flex align-items-center justify-content-center" id="login">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <img src="img/Logo.png" class="logo mb-2" alt="Pharma Track">
                </div>

                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label"><strong>Usuario</strong></label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Contraseña</strong></label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary" onclick="mostrarDashboard()">
                                Iniciar Sesión
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="#" onclick="mostrarRegistro()">Registrarse</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- DASHBOARD -->
    <div class="container mt-5 d-none" id="dashboard">
        <h3 class="mb-4">Panel Principal</h3>

        <div class="list-group">
            <!-- INVENTARIO REAL -->
            <a href="/pharma-track/public/producto.php"
               class="list-group-item list-group-item-action">
                Inventario (Productos)
            </a>

            <a href="#" class="list-group-item list-group-item-action">
                Proveedores
            </a>

            <a href="#" class="list-group-item list-group-item-action">
                Empleados
            </a>

            <a href="#" class="list-group-item list-group-item-action">
                Reportes
            </a>
        </div>
    </div>

    <!-- REGISTRO -->
    <div class="container mt-5 d-none" id="registro">
        <h3>Registro de Usuario</h3>

        <form>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control">
            </div>

            <button class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" onclick="volverLogin()">Cancelar</button>
        </form>
    </div>

</body>

</html>
