<?php

require_once __DIR__ . '/../models/Empleado.php';

class AuthController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Muestra la vista de login
    public function index()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    // Procesa el formulario de login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once __DIR__ . '/../views/auth/login.php';
            exit();
        }

        $usuario = trim($_POST['usuario'] ?? '');
        $clave = $_POST['clave'] ?? '';

        if ($usuario === '' || $clave === '') {
            $error = true;
            require_once __DIR__ . '/../views/auth/login.php';
            exit();
        }

        $empleadoModel = new Empleado();
        $empleado = $empleadoModel->obtenerPorUsuario($usuario);

        if (!$empleado || !password_verify($clave, $empleado['clave'])) {
            $error = true;
            require_once __DIR__ . '/../views/auth/login.php';
            exit();
        }

        // Login correcto
        $_SESSION['empleado'] = [
            'id'      => $empleado['empleado_id'],
            'nombre'  => $empleado['nombre'],
            'usuario' => $empleado['usuario']
        ];

        header('Location: /pharma-track/public/index.php?url=/dashboard');
        exit();
    }

    // Cerrar sesión
    public function logout()
    {
        session_destroy();
        header("Location: /pharma-track/public/index.php?url=/login");
        exit();
    }
}