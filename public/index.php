<?php

// Solo mostrar errores en localhost
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
}

// URL base del proyecto — cambia esto si mueves la carpeta
define('BASE_URL', '/pharma-track/public/index.php?url=');

// Cargar Rutas
$routes = require __DIR__ . '/../app/routes/web.php';

// Obtener la ruta solicitada
$url = parse_url($_GET['url'] ?? '/', PHP_URL_PATH);
// Normalizar la URL
$url = rtrim($url, '/');
if (empty($url)) {
    $url = '/';
}

// Variables para almacenar la ruta encontrada y los parámetros
$matchedRoute = null;
$params = [];

// Buscar la ruta en las rutas definidas
foreach ($routes as $pattern => $route) {
    if (preg_match($pattern, $url, $matches)) {
        $matchedRoute = $route;
        $params = array_slice($matches, 1);
        break;
    }
}

// Si se encontró la ruta
if ($matchedRoute) {

    // Validar método HTTP si la ruta lo especifica
    if (isset($matchedRoute[2]) && $_SERVER['REQUEST_METHOD'] !== $matchedRoute[2]) {
        http_response_code(405);
        die("405 - Método no permitido");
    }

    $controllerClass = $matchedRoute[0];
    $action = $matchedRoute[1];

    $controllerFile = __DIR__ . '/../app/controllers/' . $controllerClass . '.php';

    if (!file_exists($controllerFile)) {
        http_response_code(404);
        die("404 - Controlador no encontrado");
    }

    require_once $controllerFile;

    if (!class_exists($controllerClass)) {
        http_response_code(404);
        die("404 - Clase no encontrada");
    }

    $controller = new $controllerClass();

    if (!method_exists($controller, $action)) {
        http_response_code(404);
        die("404 - Método no válido");
    }

    if (!empty($params)) {
        call_user_func_array([$controller, $action], $params);
    } else {
        $controller->$action();
    }

} else {
    http_response_code(404);
    die("404 - Página no encontrada");
}