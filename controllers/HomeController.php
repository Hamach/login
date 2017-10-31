<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Middleware\AuthMiddleware;

class HomeController
{
    public function __construct()
    {
        AuthMiddleware::auth();
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
}