<?php
declare(strict_types=1);
define('BASE_PATH', __DIR__ . '/');
require 'autoload.php';
use App\Models\DataBase;
$db = new DataBase(
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);
$conn = $db->connect();
