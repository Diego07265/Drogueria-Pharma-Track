<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
           padding: 0;
        }

        .logo {
            width: 150px;
        }
    </style>
</head>

<body>
    <!-- Login Page -->
    <div class="container vh-100 d-flex align-items-center justify-content-center" id="login">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white py-2">
                    <img src="/pharma-track/img/Logo.png" alt="Pharma Track" class="logo mb-1" style="max-height: 100px;">
                </div>

                <div class="card-body">
                    <form method="post" action="/pharma-track/public/index.php?controller=auth&action=login">

                        <div class="mb-3">
                            <label for="usuario"><strong>Usuario</strong></label>
                            <input
                                id="usuario"
                                type="text"
                                name="usuario"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="clave"><strong>Contraseña</strong></label>
                            <input
                                id="clave"
                                type="password"
                                name="clave"
                                class="form-control"
                                required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>