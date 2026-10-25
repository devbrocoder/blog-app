<?php
namespace App\Models;

use PDO;

class Post {
    private $pdo;
    public function __construct(PDO $pdo){
        $pdo = $this->pdo;
    }
    public function create(string $title, string $subtitle,?int $category, ?int $thunmbnailid, string $content,?int $author, string $date): bool{

    }
}
