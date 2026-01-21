<?php

require_once __DIR__ . '/../core/Auth.php';

class DashboardController
{

    public function construct()
    {
        Auth::check(); // Protege el Dashboard evitando accesos no autorizados
    }

    public function index()  // Vista del Dashboard
    {
        require __DIR__ . '/../views/dashboard/index.php';
    }
}
