<?php

namespace models;

use App\Core\Database\DB;

class User
{
    private $login;
    private $email;
    private $password;

    const FILE_NAME = 'users.txt';

    public function __construct($login, $email, $password)
    {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function save()
    {
        if (!DB::isAlreadyExists(self::FILE_NAME, [$this->login, $this->email])) {
            DB::save(self::FILE_NAME, [$this->login, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
            return $this;
        }
        return false;
    }
}