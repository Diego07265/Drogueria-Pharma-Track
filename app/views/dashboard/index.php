<?php
require_once __DIR__ . '/../layout/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Panel Principal</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h4>Productos</h4>
                <p>Gestionar productos</p>
                <a href="/pharma-track/public/index.php?controller=producto&action=index" class="btn btn-primary">
                    Entrar
                </a>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card shadow-sm text-center p-4">
            <h4>Categorias</h4>
            <p>Gestionar categorias</p>
            <a href="/pharma-track/public/index.php?controller=categoria&action=index" class="btn btn-success">
                Entrar
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm text-center p-4">
            <h4>Invetario</h4>
            <p>Control de stock</p>
            <a href="#" class="btn btn-warning">
                Proximante
            </a>
        </div>
    </div>

</div>
</div>

<?php
require_once __DIR__ . '/../layout/footer.php';