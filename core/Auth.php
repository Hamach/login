<?php

namespace App\Core;

class Auth
{
    public static function user()
    {
        return isset($_SESSION['user']) ? '12' : false;
    }
}