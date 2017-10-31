<?php

session_start();

//core classes
require 'Router.php';
require 'Request.php';
require 'database/DB.php';
require 'Validator.php';
require 'Auth.php';

require 'middleware/AuthMiddleware.php';

//controllers
require 'controllers/HomeController.php';
require 'controllers/RegisterController.php';
require 'controllers/LoginController.php';

// models
require 'models/User.php';

// global functions
function view($name, $data = [])
{
    extract($data);
    return require 'views/' . $name . '.view.php';
}

function redirect($path)
{
    header('Location: /' . $path);
}