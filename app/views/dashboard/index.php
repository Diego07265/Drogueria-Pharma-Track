<?php
require_once __DIR__ . '/../layout/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Panel Principal</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h4>Productos</h4>
                <h2><?= $totalProductos ?></h2>
                <p>Gestionar productos</p>
                <a href="/pharma-track/public/index.php?controller=producto&action=index" class="btn btn-primary">
                    Entrar
                </a>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card shadow-sm text-center p-4">
            <h4>Categorias</h4>
            <h2><?= $totalCategorias ?></h2>
            <p>Gestionar categorias</p>
            <a href="/pharma-track/public/index.php?controller=categoria&action=index" class="btn btn-success">
                Entrar
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm text-center p-4">
            <h4>Inventario</h4>
            <p class="fw-bold">Stock bajo<?= $stockBajo ?></p>
            <p>Productos con stock bajo</p>
            <a href="/pharma-track/public/index.php?controller=inventario&action=index" class="btn btn-warning">
                Entrar
            </a>
        </div>
    </div>

</div>
</div>

<?php
require_once __DIR__ . '/../layout/footer.php';