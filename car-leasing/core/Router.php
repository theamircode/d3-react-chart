<?php

declare(strict_types=1);

namespace Core;

final class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = [
            'GET' => [
                '/' => ['App\\Controllers\\HomeController', 'index'],
                '/login' => ['App\\Controllers\\AuthController', 'showLogin'],
                '/register' => ['App\\Controllers\\AuthController', 'showRegister'],
                '/admin' => ['App\\Controllers\\AdminController', 'index'],
                '/leases/create' => ['App\\Controllers\\LeaseController', 'create'],
            ],
            'POST' => [
                '/login' => ['App\\Controllers\\AuthController', 'login'],
                '/register' => ['App\\Controllers\\AuthController', 'register'],
                '/logout' => ['App\\Controllers\\AuthController', 'logout'],
                '/leases' => ['App\\Controllers\\LeaseController', 'store'],
            ],
        ];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $method = strtoupper($method);

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$class, $action] = $this->routes[$method][$path];
        $controller = new $class();
        $controller->$action();
    }
}
