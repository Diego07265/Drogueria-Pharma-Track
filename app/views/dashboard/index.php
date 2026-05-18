<?php
require_once __DIR__ . '/../layout/header.php';
?>

<div class="container d-flex flex-column justify-content-center" style="min-height: calc(100vh - 56px);background: transparent;">

    <h2 class="mb-4 text-center">Panel Principal</h2>

    <div class="row g-4 justify-content-center">

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h4>Productos</h4>
                <h2><?= (int)$totalProductos ?></h2>
                <p>Gestionar productos</p>
                <a href="<?= BASE_URL ?>/productos" class="btn btn-primary">
                    Entrar
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h4>Categorías</h4>
                <h2><?= (int)$totalCategorias ?></h2>
                <p>Gestionar categorías</p>
                <a href="<?= BASE_URL ?>/categorias" class="btn btn-success">
                    Entrar
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h4>Inventario</h4>
                <h2><?= (int)$stockBajo ?></h2>
                <p>Productos con stock bajo</p>
                <a href="<?= BASE_URL ?>/inventario" class="btn btn-warning">
                    Entrar
                </a>
            </div>
        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>