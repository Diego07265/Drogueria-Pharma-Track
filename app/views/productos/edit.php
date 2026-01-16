<?php
$categorias = $categorias ?? [];
$proveedores = $proveedores ?? [];
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="/pharma-track/assets/css/bootstrap.min.css">
  <script src="/pharma-track/assets/js/bootstrap.bundle.min.js"></script>
  <style>
    .fondo {
      position: fixed;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .navbar,
    .container,
    .card {
      position: relative;
      z-index: 1;
    }

    .logo {
      width: 150px;
      filter: drop-shadow(0 0 5px white);
    }
  </style>
</head>

<body class="bg-light">
  <img src="/pharma-track/assets/img/26800.jpg" class="fondo" alt="Fondo">

  <!-- Header -->
  <nav class="navbar navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/pharma-track/index.php">
        <img src="/pharma-track/assets/img/Logo.png" class="logo me-2" alt="Logo">
        <strong>Droguería - Gestión de Productos</strong>
      </a>
    </div>
  </nav>

  <!-- Formulario de edición -->
  <div class="container mt-5 mb-5">
    <div class="card shadow bg-white">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Editar Producto</h5>
      </div>

      <div class="card-body">
        <form action="/pharma-track/public/index.php?controller=producto&action=update" method="post">
          <input type="hidden" name="producto_id" value="<?= (int)$producto['producto_id'] ?>">

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Categoría *</label>
              <select name="categoria_id" class="form-select">
                <option value="">-- Seleccionar Categoría --</option>
                <?php foreach ($categorias as $categoria): ?>
                  <option
                    value="<?= htmlspecialchars((string)$categoria['categoria_id']) ?>"
                    <?= $categoria['categoria_id'] == $producto['categoria_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categoria['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Precio</label>
              <input type="number" step="0.01" name="precio" class="form-control" value="<?= htmlspecialchars((string)$producto['precio']) ?>" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Stock</label>
              <input type="number" name="stock" class="form-control" value="<?= htmlspecialchars((string)$producto['stock']) ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Fecha de Vencimiento</label>
              <input type="date" name="fecha_vencimiento" class="form-control" value="<?= htmlspecialchars((string)$producto['fecha_vencimiento']) ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">Proveedor *</label>
              <select name="id_proveedor" class="form-select" >
                <option value="">-- Seleccionar Proveedor --</option>
                <?php foreach ($proveedores as $proveedor): ?>
                  <option
                    value="<?= htmlspecialchars((string)$proveedor['id_proveedor']) ?>"
                    <?= $proveedor['id_proveedor'] == $producto['id_proveedor'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($proveedor['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-check mb-4">
            <input id="rec" name="requiere_receta" type="checkbox" class="form-check-input" <?= $producto['requiere_receta'] ? 'checked' : '' ?> value="1">
            <label class="form-check-label" for="rec">Requiere Receta</label>
          </div>

          <div class="d-flex justify-content-between">
            <a href="/pharma-track/public/index.php?controller=producto&action=index"
              class="btn btn-secondary">⬅ Cancelar</a>
            <button type="submit"
              class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>