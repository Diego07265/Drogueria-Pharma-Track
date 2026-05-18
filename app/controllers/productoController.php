<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../core/Auth.php';

class ProductoController
{
    public function __construct()
    {
        Auth::check();
    }

    public function index(): void
    {
        $productoModel = new Producto();
        $productos = $productoModel->listar();

        require_once __DIR__ . '/../views/productos/index.php';
    }

    public function create(): void
    {
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->listar();

        require_once __DIR__ . '/../views/productos/create.php';
    }

    public function store(): void
    {
        $datos = [
            'nombre'            => trim($_POST['nombre'] ?? ''),
            'categoria_id'      => (int) ($_POST['categoria_id'] ?? 0),
            'precio'            => (float) ($_POST['precio'] ?? 0),
            'stock'             => (int) ($_POST['stock'] ?? 0),
            'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
            'requiere_receta'   => isset($_POST['requiere_receta']) ? 1 : 0,
            'id_proveedor'      => (int) ($_POST['id_proveedor'] ?? 0),
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

        header('Location: ' . BASE_URL . '/productos&msg=ok');
        exit;
    }

public function edit(string $id): void
{
    if (!is_numeric($id)) {
        header('Location: ' . BASE_URL . '/productos');
        exit;
    }

    $id = (int) $id;

    $productoModel = new Producto();
    $producto = $productoModel->obtenerPorId($id);

    if (!$producto) {
        header('Location: ' . BASE_URL . '/productos');
        exit;
    }

    $categoriaModel = new Categoria();
    $categorias = $categoriaModel->listar();

    // Proveedores temporales hasta tener modelo Proveedor
    $proveedores = [
        ['id_proveedor' => 1, 'nombre' => 'Laboratorios ColSalud'],
        ['id_proveedor' => 2, 'nombre' => 'Distribuidora FarmaPlus'],
        ['id_proveedor' => 3, 'nombre' => 'Distribuidora San José'],
        ['id_proveedor' => 4, 'nombre' => 'Farmacéutica Andina'],
    ];

    require_once __DIR__ . '/../views/productos/edit.php';
}

    public function update(string $id): void
    {
        $datos = [
            'producto_id'       => (int) $id,
            'nombre'            => trim($_POST['nombre'] ?? ''),
            'categoria_id'      => (int) ($_POST['categoria_id'] ?? 0),
            'precio'            => (float) ($_POST['precio'] ?? 0),
            'stock'             => (int) ($_POST['stock'] ?? 0),
            'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
            'requiere_receta'   => isset($_POST['requiere_receta']) ? 1 : 0,
            'id_proveedor'      => (int) ($_POST['id_proveedor'] ?? 0),
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

        header('Location: ' . BASE_URL . '/productos&msg=updated');
        exit;
    }

    public function delete(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: ' . BASE_URL . '/productos');
            exit;
        }

        $id = (int) $id;

        $producto = new Producto();
        $producto->eliminar($id);

        header('Location: ' . BASE_URL . '/productos&msg=deleted');
        exit;
    }
}