<?php

namespace App\Helpers;

class AuthMiddleware
{
    public static function checkRole($role)
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }

    public static function requireRole($role)
    {
        if (!self::checkRole($role)) {
            header("Location: /login");
            exit;
        }
    }
}
