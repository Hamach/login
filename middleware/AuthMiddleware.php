<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function auth()
    {
        return isset($_SESSION['user']) ? redirect('login') : false;
    }
}