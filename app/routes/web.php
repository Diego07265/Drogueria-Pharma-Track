<?php

return [
    //AUTH
    '/^\/$/i' => ['AuthController', 'Login'],
    '/^\/login$/i' => ['AuthController', 'Login'],
    '/^\/logout$/i' => ['AuthController', 'Logout'],

    //DASHBOARD
    '/^\/dashboard$/i' => ['DashboardController', 'index'],

    //PRODUCTOS
    '/^\/productos$/i' => ['ProductoController', 'index'],
    '/^\/productos\/create$/i' => ['ProductoController', 'create'],    
    '/^\/productos\/store$/i' => ['ProductoController', 'store'],
    '/^\/productos\/(\d+)\/edit$/i' => ['ProductoController', 'edit'],
    '/^\/productos\/(\d+)\/update$/i' => ['ProductoController', 'update'],
    '/^\/productos\/(\d+)\/delete$/i' => ['ProductoController', 'delete'],

    //CATEGORIAS
    '/^\/categorias$/i' => ['CategoriaController', 'index'],
    '/^\/categorias\/create$/i' => ['CategoriaController', 'create'],
    '/^\/categorias\/store$/i' => ['CategoriaController', 'store'],
    '/^\/categorias\/(\d+)\/edit$/i' => ['CategoriaController', 'edit'],
    '/^\/categorias\/(\d+)\/update$/i' => ['CategoriaController', 'update'],
    '/^\/categorias\/(\d+)\/delete$/i' => ['CategoriaController', 'delete'],

    //INVENTARIO
    '/^\/inventario$/i' => ['InventarioController', 'index'],    
];