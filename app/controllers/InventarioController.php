<?php

declare(strict_types=1);

require_once __DIR__ . "/../models/producto.php";
require_once __DIR__ . "/../core/Auth.php";

class InventarioController
{
    public function __construct()
    {
        Auth::check(); // Protege el Inventario evitando accesos no autorizados
    }
    public function index(): void  //vista inventario
    {
        $productoModel = new Producto();
        $productos = $productoModel->listar();               
        require_once __DIR__ . '/../views/inventario/index.php';
    }
}

// Protege con login el inventario
// Usa Producto model para listar productos en inventario
// Carga la vista de inventario
// Obtiene todos los productos