<?php
namespace App\Models;

use PDO;

class Tag {
    private $pdo;
    public function __construct(PDO $pdo){
        $pdo = $this->pdo;
    }
    public function create(string $title,?int $parentid=null,string $thunmbnail,string $content,string $date,?int $author): bool{
        return null;
    }
}
