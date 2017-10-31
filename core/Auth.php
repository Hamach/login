<?php

namespace App\Core;

class Auth
{
    public static function user()
    {
      return isset($_SESSION['user']) ? $_SESSION['user'] : false;
    }

    public static function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }
}