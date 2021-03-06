<?php

namespace App\Controllers;

use App\Core\Database\DB;
use App\Core\Auth;

class LoginController
{
    const FILE_NAME = 'users.txt';

    public function index()
    {
        return view('/login');
    }

    public function login()
    {
        $user = DB::getItem(self::FILE_NAME, $_POST['login']);

        if (!$user || !password_verify($_POST['password'], $user[2]))  {
            $errors[] = 'There is no user with this name and this password!';
            return view('login', ['errors' => $errors]);
        }

       Auth::login([
           'login' => $user[0],
           'email' => $user[1]
       ]);

        return redirect('');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}