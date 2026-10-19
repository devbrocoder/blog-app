<?php
namespace App\Models;

use PDO;

class Image {
    private $pdo;
    public function __construct(PDO $pdo){
        $pdo = $this->pdo;
    }
    public function create(?int $postid, string $path,string $size, string $name, string $type, string $date): bool{
        return null;
    }
}