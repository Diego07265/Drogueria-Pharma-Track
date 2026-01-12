<?php

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
        // Verificar que la solicitud sea POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = $_POST['usuario'] ?? '';
            $clave = $_POST['clave'] ?? '';

            //validación basica
            if (empty($usuario) || empty($clave)) {
                echo "Todos los campos son obligatorios.";
                return;
            }

            // LLamar al modelo de usuario para autenticar
            // Por ahora, solo mostramos los datos (Prueba)

            echo "Usuario recibido: " . htmlspecialchars($usuario);
        }
    }

    //Cerrar sesión
    public function logout()
    {
        // Aquí iría la lógica para cerrar sesión
        session_start();
        session_destroy();
        header("Location: index.php?controller=auth");
    }
}
