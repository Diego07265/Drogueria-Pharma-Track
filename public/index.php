<?php
/**
 * Punto de entrada de la aplicación
 * Front Controller - MVC
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Obtener controlador y acción
$controllerName = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'index';

// Normalizar nombre del controlador
$controllerClass = ucfirst($controllerName) . 'Controller';
$controllerFile  = __DIR__ . '/../app/controllers/' . $controllerClass . '.php';

// Verificar controlador
if (!file_exists($controllerFile)) {
    header('HTTP/1.0 404 Not Found');
    echo "404 - Controlador no encontrado";
    exit;
}

require_once $controllerFile;

// Verificar clase
if (!class_exists($controllerClass)) {
    header('HTTP/1.0 404 Not Found');
    echo "404 - Clase del controlador no encontrada";
    exit;
}

$controller = new $controllerClass();

// Acciones permitidas
$accionesPermitidas = ['index', 'create', 'store', 'edit', 'update', 'delete','login','logout'];

// Ejecutar acción
if (in_array($action, $accionesPermitidas) && method_exists($controller, $action)) {
    $controller->$action();
} else {
    header('HTTP/1.0 404 Not Found');
    echo "404 - Acción no válida";
}
