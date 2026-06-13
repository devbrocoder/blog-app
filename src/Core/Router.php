<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $path, array $handler) {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, array $handler) {
        $this->routes['POST'][$path] = $handler;
    }

    public function resolve(string $url, string $method, $db) {
        $path = parse_url($url, PHP_URL_PATH);
        $path = str_replace('/index.php', '', $path);
        if (empty($path)) {
            $path = '/';
        }
        $handler = $this->routes[$method][$path] ?? null;
        if (!$handler) {
            http_response_code(404);
            echo "404 - Route not found for: " . htmlspecialchars($path);
            return;
        }
        [$controllerClass, $methodName] = $handler;
        $controller = new $controllerClass($db);
        $controller->$methodName();
    }
}