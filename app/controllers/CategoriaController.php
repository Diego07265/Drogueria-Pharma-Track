<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../core/Auth.php';
// Cargamos Csrf para proteger los formularios
require_once __DIR__ . '/../core/Csrf.php';

class CategoriaController
{
    public function __construct()
    {
        Auth::check();
    }

    public function index(): void
    {
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->listar();

        require_once __DIR__ . '/../views/categorias/index.php';
    }

    public function create(): void
    {
        require_once __DIR__ . '/../views/categorias/create.php';
    }

    public function store(): void
    {
        // Verificamos el token CSRF antes de procesar cualquier dato
        Csrf::validarToken();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/categorias');
            exit;
        }

        $datos = [
            'nombre'      => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        if ($datos['nombre'] === '') {
            die('Error: Campos obligatorios incompletos');
        }

        $categoria = new Categoria();
        $categoria->guardar($datos);

        // Corregido: & por ?
        header('Location: ' . BASE_URL . '/categorias?msg=ok');
        exit;
    }

    public function edit(string $id): void
    {
        if (!is_numeric($id)) {
            header('Location: ' . BASE_URL . '/categorias');
            exit;
        }

        $id = (int)$id;

        $categoriaModel = new Categoria();
        $categoria = $categoriaModel->obtenerPorId($id);

        if (!$categoria) {
            header('Location: ' . BASE_URL . '/categorias');
            exit;
        }

        require_once __DIR__ . '/../views/categorias/edit.php';
    }

    public function update(string $id): void
    {
        // Verificamos el token CSRF antes de procesar cualquier dato
        Csrf::validarToken();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/categorias');
            exit;
        }

        $datos = [
            'categoria_id' => (int) $id,
            'nombre'       => trim($_POST['nombre'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
        ];

        if ($datos['categoria_id'] <= 0 || $datos['nombre'] === '') {
            die('Error: Campos obligatorios incompletos');
        }

        $categoria = new Categoria();
        $categoria->actualizar($datos['categoria_id'], $datos);

        // Corregido: & por ?
        header('Location: ' . BASE_URL . '/categorias?msg=updated');
        exit;
    }

    public function delete(string $id): void
    {
        // Verificamos el token CSRF antes de procesar cualquier dato
        Csrf::validarToken();

        if (!is_numeric($id)) {
            header('Location: ' . BASE_URL . '/categorias');
            exit;
        }

        $id = (int) $id;

        try {
            $categoria = new Categoria();
            $categoria->eliminar($id);
            // Corregido: & por ?
            header('Location: ' . BASE_URL . '/categorias?msg=deleted');
        } catch (PDOException $e) {
            // Corregido: & por ?
            header('Location: ' . BASE_URL . '/categorias?msg=error');
        }
        exit;
    }
}