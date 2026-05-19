<?php
declare(strict_types=1);

// Cargar variables del .env
$env = parse_ini_file(dirname(__DIR__, 2) . '/.env');

if ($env === false) {
    http_response_code(500);
    error_log('no se encontró el archivo .env');
    echo 'Error de configuración. Contacte al administrador.';
    exit;
}

$dsn = "mysql:host={$env['DB_HOST']};port={$env['DB_PORT']};dbname={$env['DB_NAME']};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    return new PDO($dsn, $env['DB_USER'], $env['DB_PASS'], $options);
}catch (PDOException $e){
    http_response_code(500);
    error_log($e->getMessage());
    echo 'Error de conexión. Contacte al administrador. ';
    exit;
}