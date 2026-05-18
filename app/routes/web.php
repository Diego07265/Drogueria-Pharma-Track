<?php
// Rutas definidas como expresiones regulares que mapean a controladores y métodos específicos
return [
    //AUTH
    '/^\/$/i'=> ['AuthController', 'Login',    'GET'],
    '/^\/login$/i'=> ['AuthController', 'Login',    'GET'],
    '/^\/login\/submit$/i'=> ['AuthController', 'login',    'POST'],
    '/^\/logout$/i'=> ['AuthController', 'Logout',   'POST'],

    //DASHBOARD
    '/^\/dashboard$/i'=> ['DashboardController', 'index', 'GET'],

    //PRODUCTOS
    '/^\/productos$/i'=> ['ProductoController', 'index',  'GET'],
    '/^\/productos\/create$/i'=> ['ProductoController', 'create', 'GET'],
    '/^\/productos\/store$/i'=> ['ProductoController', 'store',  'POST'],
    '/^\/productos\/(\d+)\/edit$/i'=> ['ProductoController', 'edit',   'GET'],
    '/^\/productos\/(\d+)\/update$/i'=> ['ProductoController', 'update', 'POST'],
    '/^\/productos\/(\d+)\/delete$/i'=> ['ProductoController', 'delete', 'POST'],

    //CATEGORIAS
    '/^\/categorias$/i'=> ['CategoriaController', 'index',  'GET'],
    '/^\/categorias\/create$/i'=> ['CategoriaController', 'create', 'GET'],
    '/^\/categorias\/store$/i'=> ['CategoriaController', 'store',  'POST'],
    '/^\/categorias\/(\d+)\/edit$/i'=> ['CategoriaController', 'edit',   'GET'],
    '/^\/categorias\/(\d+)\/update$/i'=> ['CategoriaController', 'update', 'POST'],
    '/^\/categorias\/(\d+)\/delete$/i'=> ['CategoriaController', 'delete', 'POST'],

    //INVENTARIO
    '/^\/inventario$/i'=> ['InventarioController', 'index', 'GET'],
];