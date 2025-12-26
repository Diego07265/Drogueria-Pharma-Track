<?php

// Mostrar errores (solo en desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cargar controlador
require_once __DIR__ . '/../app/controllers/ProductoController.php';

$controller = new ProductoController();

// Acciones permitidas
$accionesPermitidas = ['index', 'create', 'store', 'edit', 'update', 'delete'];

// Acción solicitada
$action = $_GET['action'] ?? 'index';

// Ejecutar acción
if (in_array($action, $accionesPermitidas) && method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Acción no válida";
}

