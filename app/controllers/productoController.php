<?php

/**
 * Controlador Producto
 * Conecta el modelo con las vistas para gestionar productos.
 */

declare(strict_types=1);
require_once __DIR__ . '/../models/producto.php';

class productoController
{
    public function index()
    {
        $producto = new producto();
        $productos = $producto->listar();
        require_once __DIR__ . '/../views/productos/index.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Recibir y limpiar datos
            $datos = [
                'nombre' => trim($_POST['nombre'] ?? ''),
                'categoria_id' => (int) ($_POST['categoria_id'] ?? 0),
                'precio' => (float) ($_POST['precio'] ?? 0),
                'stock' => (int) ($_POST['stock'] ?? 0),
                'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? null,
                'requiere_receta' => isset($_POST['requiere_receta']) ? 1 : 0,
                'id_proveedor' => (int) ($_POST['id_proveedor'] ?? 0)
            ];

            // Validaciones básicas
            if (
                $datos['nombre'] === '' ||
                $datos['categoria_id'] <= 0 ||
                $datos['precio'] <= 0 ||
                $datos['stock'] < 0 ||
                $datos['id_proveedor'] <= 0
            ) {
                die('Error: Campos obligatorios incompletos');
            }

            // Guardar usando el modelo
            $producto = new Producto();
            $producto->guardar($datos);

            // Redirigir al listado
            header('Location: index.php?msg=ok');
            exit;
        }
    }

    public function create(): void
    {
        require_once __DIR__ . '/../views/productos/create.php';
    }

    
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $producto = new producto();
            $producto->eliminar($_GET['id']);   
            header('Location: index.php');
            exit;
        }
        
    }
}
