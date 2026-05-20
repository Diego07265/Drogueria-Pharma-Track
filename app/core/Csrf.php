<?php

class Csrf
{
    /**
     * Genera Token CSRF 
     * un token es un valor aleatorio que se utiliza para proteger las aplicaciones web contra ataques de falsificación de solicitudes entre sitios (CSRF).
     */
    public static function generarToken(): string
    {
        // Si la sesion no esta iniciada, la iniciamos
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if (empty($_SESSION['csrf_token'])){
            //bin2hex() genera texto legible a partir de bytes aleatorios
            // random_bytes(32) genera 32 bytes aleatorios -> muy dificil de adivinar
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        // Devolvemos el token generado para que la vista lo pueda usar 
        return $_SESSION['csrf_token'];
    }
    /**
     * VALIDAR TOKEN
     * 
     * Compara el token que llegó desde el formulario (en $_POST)
     * con el que tenemos guardado en la sesión.
     * Si no coinciden, alguien está intentando hacer algo malo → bloqueamos.
     */
    public static function validarToken(): void
    {
        // Si la sesion no esta iniciada, la iniciamos
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }

    // Obtenemos el token enviado desde el formulario 
    $tokenFormulario = $_POST['csrf_token'] ?? '';

    // Obtenemos el token guardado en la sesión
    $tokenSesion = $_SESSION['csrf_token'] ?? '';

    if (!hash_equals($tokenSesion, $tokenFormulario)) {
            http_response_code(403); // 403 = "Prohibido"
            die('Error de seguridad: token CSRF inválido.');
        }
    }
}
