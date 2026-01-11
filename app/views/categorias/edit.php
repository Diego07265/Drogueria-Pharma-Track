<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
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

    <h2>Editar Categoría</h2>

    <form method="post" action="/pharma-track/public/index.php?controller=categoria&action=update">
        <input type="hidden" name="categoria_id" value="<?= (int)$categoria['categoria_id'] ?>">

        <div class="mb-3">
            <label class="form-label">nombre *</label>
            <input type="text"
                name="nombre"
                class="form-control"
                value="<?= htmlspecialchars($categoria['nombre'] ?? '') ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control"><?= htmlspecialchars($categoria['descripcion'] ?? "") ?></textarea>
        </div>
        <a href="/pharma-track/public/index.php?controller=categoria&action=index" class="btn btn-secondary">
            Cancelar
        </a>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>

</body>


</html>