<?php

class Auth 
{
    public static function check(): void
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if(!isset($_SESSION['empleado'])){
            header('Location: index.php?controller=auth');
            exit();
        }
    
    }
}
