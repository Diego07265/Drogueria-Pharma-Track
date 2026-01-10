<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Producto.php';

class ProductoController
{
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
            header('Location: /pharma-track/public/index.php?controller=producto&action=index');
            exit;
        }

        $datos = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'categoria_id' => 0,
            'precio' => (float) ($_POST['precio'] ?? 0),
            'stock' => (int) ($_POST['stock'] ?? 0),
            'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
            'requiere_receta' => isset($_POST['requiere_receta']) ? 1 : 0,
            'id_proveedor' => 0,
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

        header('Location: /pharma-track/public/index.php?controller=producto&action=index&msg=ok');
        exit;
    }

    public function edit(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: /pharma-track/public/index.php?controller=producto&action=index');
            exit;
        }

        $id = (int) $_GET['id'];

        $productoModel = new Producto();
        $producto = $productoModel->obtenerPorId($id);

        if (!$producto) {
            header('Location: /pharma-track/public/index.php?controller=producto&action=index');
            exit;
        }

        require_once __DIR__ . '/../views/productos/edit.php';
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /pharma-track/public/index.php?controller=producto&action=index');
            exit;
        }

        $datos = [
            'producto_id' => (int) ($_POST['producto_id'] ?? 0),
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

        header('Location: /pharma-track/public/index.php?controller=producto&action=index&msg=updated');
        exit;
    }

    public function delete(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: /pharma-track/public/index.php?controller=producto&action=index');
            exit;
        }

        $id = (int) $_GET['id'];

        $producto = new Producto();
        $producto->eliminar($id);

        header('Location: /pharma-track/public/index.php?controller=producto&action=index&msg=deleted');
        exit;
    }
}
