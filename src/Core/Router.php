<?php
namespace App\Core;

use PDO;

class Router {
    private array $routes = [];
    /**
    * Register a GET route.
    *
    * @param string $path
    * @param array $handler
    */
    public function get(string $path, array $handler): void {
        $this->routes['GET'][$path] = $handler;
    }
    /**
    * Register a POST route.
    *
    * @param string $path
    * @param array $handler
    */
    public function post(string $path, array $handler): void {
        $this->routes['POST'][$path] = $handler;
    }

    public function resolve(string $url, string $method,PDO $pdo): void {
        $path = parse_url($url, PHP_URL_PATH);
        $path = str_replace('/index.php', '', $path);
        if (empty($path)) {
            $path = '/';
        }
        $method = strtoupper($method);
        $handler = $this->routes[$method][$path] ?? null;
        if (!$handler) {
            http_response_code(404);
            echo "404 - Route not found for: " . htmlspecialchars($path);
            return;
        }
        [$controllerClass, $methodName] = $handler;
        $controller = new $controllerClass($pdo);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->$methodName($_POST);
        } else {
            $controller->$methodName();
        }
    }
}