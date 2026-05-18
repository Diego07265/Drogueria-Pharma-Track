<?php
require_once __DIR__ . '/../layout/header.php';
?>

<h2 class="mb-3">Editar Categoría</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="<?= BASE_URL ?>/categorias/<?= (int)$categoria['categoria_id'] ?>/update">
            <input type="hidden" name="categoria_id" value="<?= (int)$categoria['categoria_id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text"
                    name="nombre"
                    class="form-control"
                    value="<?= htmlspecialchars($categoria['nombre'] ?? '') ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control"><?= htmlspecialchars($categoria['descripcion'] ?? '') ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= BASE_URL ?>/categorias" class="btn btn-secondary">
                    ⬅ Cancelar
                </a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>