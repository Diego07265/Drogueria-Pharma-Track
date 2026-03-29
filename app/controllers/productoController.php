<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../core/Auth.php';
class ProductoController

{
    public function __construct()
    {
        Auth::check(); // Protección de rutas
    }
    public function index(): void
    {
        $producto = new Producto();
        $productos = $producto->listar();

        require_once __DIR__ . '/../views/productos/index.php';
    }

    public function create(): void
    {
        require_once __DIR__ . '/../views/productos/create.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /pharma-track/public/index.php?url=/productos');
            exit;
        }

        $datos = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'categoria_id' => (int)($_POST['categoria_id'] ?? 0),
            'precio' => (float) ($_POST['precio'] ?? 0),
            'stock' => (int) ($_POST['stock'] ?? 0),
            'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
            'requiere_receta' => isset($_POST['requiere_receta']) ? 1 : 0,
            'id_proveedor' => (int) ($_POST['id_proveedor'] ?? 0),
        ];

        if (
            $datos['nombre'] === '' ||
            $datos['precio'] <= 0 ||
            $datos['stock'] < 0
        ) {
            die('Error: Campos obligatorios incompletos');
        }

        $producto = new Producto();
        $producto->guardar($datos);

        header('Location: /pharma-track/public/index.php?url=/productos&msg=ok');
        exit;
    }

    public function edit(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: /pharma-track/public/index.php?url=/productos');
            exit;
        }

        $id = (int) $id;

        $productoModel = new Producto();
        $producto = $productoModel->obtenerPorId($id);

        if (!$producto) {
            header('Location: /pharma-track/public/index.php?url=/productos');
            exit;
        }

        require_once __DIR__ . '/../views/productos/edit.php';
    }

    public function update(string $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /pharma-track/public/index.php?url=/productos');
            exit;
        }

        $datos = [
            'producto_id' => (int) $id,
            'nombre' => trim($_POST['nombre'] ?? ''),
            'categoria_id' => null,
            'precio' => (float) ($_POST['precio'] ?? 0),
            'stock' => (int) ($_POST['stock'] ?? 0),
            'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
            'requiere_receta' => isset($_POST['requiere_receta']) ? 1 : 0,
            'id_proveedor' => null,
        ];

        if (
            $datos['producto_id'] <= 0 ||
            $datos['nombre'] === '' ||
            $datos['precio'] <= 0 ||
            $datos['stock'] < 0
        ) {
            die('Error: Campos obligatorios incompletos');
        }

        $producto = new Producto();
        $producto->actualizar($datos['producto_id'], $datos);

        header('Location: /pharma-track/public/index.php?url=/productos&msg=updated');
        exit;
    }

    public function delete(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: /pharma-track/public/index.php?url=/productos');
            exit;
        }

        $id = (int) $id;

        $producto = new Producto();
        $producto->eliminar($id);

        header('Location: /pharma-track/public/index.php?url=/productos&msg=deleted');
        exit;
    }
}
