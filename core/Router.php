<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri, $requestType)
    {
        try {
            if (array_key_exists($uri, $this->routes[$requestType])) {
                $controller = $this->routes[$requestType][$uri];
                $method = explode('@', $controller)[1];
                $controllerClass = 'App\\Controllers\\' . explode('@', $controller)[0];
                $class = new $controllerClass();
                return $class->$method();
            }
        } catch (\Exception $e) {
            throw new \Exception('This route is not defined');
        }
    }
}