<?php
declare(strict_types= 1);
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../core/Auth.php';

class DashboardController
{

    public function __construct()
    {
        Auth::check(); // Protege el Dashboard evitando accesos no autorizados
    }

    public function index()  // Vista del Dashboard
    {
    $productoModel = new Producto();
    $categoriaModel = new Categoria();
    
    // Obtener Listas 
    $productos = $productoModel->listar();

    // totales
    $totalProductos = count($productos);
    $totalCategorias = $categoriaModel->contar();

    //Stock Bajo
    $stockBajo = 0;
    foreach ($productos as $p){
        if ((int)$p['stock']<=10){
            $stockBajo ++;
        }
    }   

    require __DIR__ . '/../views/dashboard/index.php';
    }
}