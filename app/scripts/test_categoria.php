<?php

require_once __DIR__ . '/../app/models/Categoria.php';

$categoriaModel = new Categoria();

// Probar listar categorías
$categorias = $categoriaModel->listar();

echo '<pre>';
var_dump($categorias);
echo '</pre>';
