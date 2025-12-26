<?php
require_once __DIR__ . '/../config/bd.php';
$rows = $pdo->query('SELECT id,nombre FROM producto LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
