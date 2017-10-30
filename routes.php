<?php

$router->get('', 'HomeController@index');

$router->get('signIn', 'RegisterController@index');
$router->post('signIn', 'RegisterController@store');

$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
// $router->get('logout', 'LoginController@logout');