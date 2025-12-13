<?php

declare(strict_types=1);
require_once __DIR__ . '/../config/bd.php';

// Validar ID recibido
$producto_id = $_GET['id'] ?? null;
if ($producto_id === null || !is_numeric($producto_id)) {
  echo "<div class='container mt-3'><div class='alert alert-warning'>ID de producto inválido.</div></div>";
  exit;
}
//Obtener el producto a editar
try {
  $sql = 'SELECT * FROM producto WHERE producto_id = :id LIMIT 1';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $producto_id]);
  $producto = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$producto) {
    echo "<div class='container mt-3'><div class='alert alert-warning'>Producto no encontrado.</div></div>";
    exit;
  }
} catch (PDOException $e) {
  echo "<div class='container mt-3'><div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div></div>";
  exit;
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Editar Producto</title>
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

  <!--Formulario de edición-->
  <div class="container mt-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Editar Producto</h5>
      </div>

      <div class="card-body">
        <form action="/pharma-track/public/update.php" method="post">
          <input type="hidden" name="producto_id" value="<?= htmlspecialchars((string)$producto['producto_id']) ?>">

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nombre</label>
              <input name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Categoría</label>
              <input name="categoria_id" class="form-control" value="<?= htmlspecialchars($producto['categoria_id']) ?>" required>
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
              <label class="form-label">fecha_vencimiento</label>
              <input name="fecha_vencimiento" type="date" class="form-control" value="<?= htmlspecialchars((string)$producto['fecha_vencimiento']) ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">ID Proveedor</label>
              <input name="id_proveedor" type="number" class="form-control" value="<?= htmlspecialchars((string)$producto['id_proveedor']) ?>" required>
            </div>
          </div>

          <div class="form-check mb-4">
            <input id="rec" name="requiere_receta" type="checkbox" class="form-check-input" <?= $producto['requiere_receta'] ? 'checked' : '' ?> value="1">
            <label class="form-check-label" for="rec">Requiere Receta</label>
          </div>

          <div class="d-flex justify-content-between">
            <a href="/pharma-track/public/producto.php" class="btn btn-secondary">⬅ cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>