<?php
namespace App\Models;

use PDO;

class Permission{
    private $pdo;
    public function  __construct(PDO $pdo)
    {
        $pdo = $this->pdo;
    }
}
