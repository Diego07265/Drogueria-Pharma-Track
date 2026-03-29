<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
    // Usar regex para encontrar coincidencias
    if (preg_match($pattern, $url, $matches)) {
        $matchedRoute = $route;
        // Los parámetros capturados están en $matches (sin incluir la coincidencia completa)
        $params = array_slice($matches, 1);
        break;
    }
}

// Si se encontró la ruta
if ($matchedRoute) {
    $controllerClass = $matchedRoute[0];
    $action = $matchedRoute[1];
    
    $controllerFile = __DIR__ . '/../app/controllers/' . $controllerClass . '.php';

    // Validar archivo
    if (!file_exists($controllerFile)) {
        die("404 - Controlador no encontrado");
    }

    require_once $controllerFile;

    // Validar clase 
    if (!class_exists($controllerClass)) {
        die("404 - Clase no encontrada");
    }

    $controller = new $controllerClass();

    // Validar método
    if (!method_exists($controller, $action)) {
        die("404 - Método no válido");
    }

    // Ejecutar con parámetros
    if (!empty($params)) {
        call_user_func_array([$controller, $action], $params);
    } else {
        $controller->$action();
    }
} else {
    die("404 - Página no encontrada");
}



