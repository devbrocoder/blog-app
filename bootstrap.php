<?php
declare(strict_types=1);
define('BASE_PATH', __DIR__ . '/');
require 'autoload.php';
use App\Models\DataBase;
$db = new DataBase('localhost', 'phptest.ru', 'root', '');
$conn = $db->connect();
$user = new App\Models\User($conn);