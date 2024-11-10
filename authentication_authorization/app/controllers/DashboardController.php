<?php

namespace App\Controllers;

use App\Helpers\AuthMiddleware;

class DashboardController
{
    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function index()
    {
        echo "Welcome to the admin dashboard!";
    }
}
