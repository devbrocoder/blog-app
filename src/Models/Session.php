<?php
namespace App\Models;

use PDO;

class Session {
    private $pdo;
    public function __construct(PDO $pdo){
        $pdo = $this->pdo;
    }
    public function create(?int $user_id,string $device_info=null,string $token,string $created_at,string $updated_at): bool{
        return null;
    }
}
