<?php
namespace App\Models;

use PDO;

class Role {
    private  $pdo;
    public function __construct(PDO $pdo)
    {
        $pdo = $this->pdo;
    }
    public function create(string $name,string $created_at,string $updated_at,string $deleted_at): array|false {
        return false;
    }
}
