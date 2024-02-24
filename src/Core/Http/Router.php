<?php

declare(strict_types=1);

namespace Core\Http;

use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, $controller) {
        $this->routes[$method][$url] = $controller;
    }

    /**
     * @throws Exception
     */
    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $controller) {
                if ($routeUrl === $url) {
                    $instance = new $controller;

                    echo $instance();

                    exit();
                }
            }
        }

        throw new Exception('Route not found');
    }
}