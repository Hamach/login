<?php

namespace App\Controllers;

use models\User;
use App\Core\Validator;
use App\Middleware\AuthMiddleware;

class RegisterController
{
    public function __construct()
    {
        AuthMiddleware::auth();
    }

    public function index()
    {
        return  view('signin');
    }

    public function store()
    {
        $errors = $this->getValidationErrors();

        $user = new User($_POST['login'], $_POST['email'], $_POST['password']);

        if (count($errors)) {
            return view('signin', ['errors' => $errors]);
        }

        if (!$user->save()) {
            $errors[] = 'User with this login or email is already exists!';
            return view('signin', ['errors' => $errors]);
        }
        return redirect('login');
    }

    private function getValidationErrors()
    {
        return Validator::validate([
            'login' => 'required|min:6',
            'email' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
    }
}