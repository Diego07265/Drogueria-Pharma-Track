<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../core/Auth.php';

class CategoriaController
{
    public function __construct()
    {
        Auth::check(); // Protección de rutas
    }

    //listar categorias
    public function index(): void
    {
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->listar();

        require_once __DIR__ . '/../views/categorias/index.php';
    }

    //Mostrar formulario para crear categoria

    public function create(): void
    {
        require_once __DIR__ . '/../views/categorias/create.php';
    }

    //Guardar nueva categoria

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /pharma-track/public/index.php?url=/categorias');
            exit;
        }

        $datos = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        if ($datos['nombre'] === '') {
            die('Error: Campos obligatorios incompletos');
        }

        $categoria = new Categoria();
        $categoria->guardar($datos);

        header('Location: /pharma-track/public/index.php?url=/categorias&msg=ok');
        exit;
    }

    // Mostrar formulario para editar categoria

    public function edit(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: /pharma-track/public/index.php?url=/categorias');
            exit;
        }
        $id = (int)$id;

        $categoriaModel = new Categoria();
        $categoria = $categoriaModel->obtenerPorId($id);

        if (!$categoria) {
            header('Location: /pharma-track/public/index.php?url=/categorias');
            exit;
        }
        require_once __DIR__ . '/../views/categorias/edit.php';
    }

    //Actualizar categoria

    public function update(string $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /pharma-track/public/index.php?url=/categorias');
            exit;
        }

        $datos = [
            'categoria_id' => (int) $id,
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        if ($datos['categoria_id'] <= 0 || $datos['nombre'] === '') {
            die('Error: Campos obligatorios incompletos');
        }

        $categoria = new Categoria();
        $categoria->actualizar($datos['categoria_id'], $datos);

        header('Location: /pharma-track/public/index.php?url=/categorias&msg=updated');
        exit;
    }
    //Eliminar categoria

    public function delete(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: /pharma-track/public/index.php?url=/categorias');
            exit;
        }

        $id = (int) $id;

        $categoria = new Categoria();
        $categoria->eliminar($id);

        header('Location: /pharma-track/public/index.php?url=/categorias&msg=deleted');
        exit;
    }
}
