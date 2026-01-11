<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{

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
            header('location: /pharma-track/public/index.php?controller=categoria&action=index');
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

        header('Location: /pharma-track/public/index.php?controller=categoria&action=index&msg=ok');
        exit;
    }

    // Mostrar formulario para editar categoria

    public function edit(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: /pharma-track/public/index.php?controller=categoria&action=index');
            exit;
        }
        $id = (int)$_GET['id'];

        $categoriaModel = new Categoria();
        $categoria = $categoriaModel->obtenerPorId($id);

        if (!$categoria) {
            header('location: /pharma-track/public/index.php?controller=categoria&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/categorias/edit.php';
    }

    //Actualizar categoria

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: /pharma-track/public/index.php?controller=categoria&action=index');
            exit;
        }

        $datos = [
            'categoria_id' => (int) ($_POST['categoria_id'] ?? 0),
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        if ($datos['categoria_id'] <= 0 || $datos['nombre'] === '') {
            die('Error: Campos obligatorios incompletos');
        }

        $categoria = new Categoria();
        $categoria->actualizar($datos['categoria_id'], $datos);

        header('location: /pharma-track/public/index.php?controller=categoria&action=index');
        exit;
    }
    //Eliminar categoria

    public function delete(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: /pharma-track/public/index.php?controller=categoria&action=index');
            exit;
        }

        $id = (int) $_GET['id'];

        $categoria = new Categoria();
        $categoria->eliminar($id);

        header('Location: /pharma-track/public/index.php?controller=categoria&action=index&msg=deleted');
        exit;
    }
}
