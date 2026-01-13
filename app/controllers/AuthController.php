<?php

require_once __DIR__ . '/../models/Empleado.php';
class AuthController
{
    //Muestra la vista de login
    public function index()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    //Procesa el formulario de login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=auth');
            exit();
        }

        $usuario = trim($_POST['usuario'] ?? '');
        $clave = $_POST['clave'] ?? '';

        if ($usuario === '' || $clave === '') {
            header('Location: index.php?controller=auth&error=1');
            exit();
        }

        $empleadoModel = new Empleado();
        $empleado = $empleadoModel->obtenerPorUsuario($usuario);

        //Usuario o clave incorrectos

        if (!$empleado || !password_verify($clave, $empleado['clave'])) {
            header('Location: index.php?controller=auth&error=1');
            exit();
        }

        // Login Correcto - Iniciar sesión

        session_start();
        $_SESSION['empleado'] = [
            'id' => $empleado['empleado_id'],
            'nombre' => $empleado['nombre'],
            'usuario' => $empleado['usuario']
        ];


        header('Location: index.php?controller=producto');
        exit();
    }

    //Cerrar sesión
    public function logout()
    {
        // Aquí iría la lógica para cerrar sesión
        session_start();
        session_destroy();
        header("Location: index.php?controller=auth");
        exit();
    }
}
