<?php
$categorias = $categorias ?? [];
$proveedores = $proveedores ?? [];

//Cargamos la clase Csrf para generar el token de seguridad
require_once __DIR__ . '/../../core/Csrf.php';
require_once __DIR__ . '/../layout/header.php';
$csrfToken = Csrf::generarToken();
?>

<div class="container mt-5 mb-5">
    <div class="card shadow bg-white">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Editar Producto</h5>
        </div>

        <div class="card-body">
            <form action="<?= BASE_URL ?>/productos/<?= (int)$producto['producto_id'] ?>/update" method="POST">
                <!-- Token de seguridad CSRF - viaja oculto con el formulario -->
                <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
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
                                    value="<?= (int)$categoria['categoria_id'] ?>"
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
                        <input type="number" step="0.01" name="precio" class="form-control"
                            value="<?= htmlspecialchars((string)$producto['precio']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control"
                            value="<?= htmlspecialchars((string)$producto['stock']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="form-control"
                            value="<?= htmlspecialchars((string)$producto['fecha_vencimiento']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Proveedor</label>
                        <select name="id_proveedor" class="form-select">
                            <option value="">-- Seleccionar Proveedor --</option>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <option
                                    value="<?= (int)$proveedor['id_proveedor'] ?>"
                                    <?= $proveedor['id_proveedor'] == $producto['id_proveedor'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($proveedor['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input id="rec" name="requiere_receta" type="checkbox" class="form-check-input"
                        <?= $producto['requiere_receta'] ? 'checked' : '' ?> value="1">
                    <label class="form-check-label" for="rec">Requiere Receta</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= BASE_URL ?>/productos" class="btn btn-secondary">⬅ Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>