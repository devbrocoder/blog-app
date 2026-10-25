<?php
declare(strict_types=1);
require_once "bootstrap.php";
use App\Core\Router;
use App\Controllers\AuthController;
$router = new Router();
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/home', [AuthController::class, 'home']);
$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'],$conn);
