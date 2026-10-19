<?php
namespace App\Models;

class Category {
    private $pdo;
    public function __construction($pdo){
      $pdo = $this->pdo;
    }
    public function create($title,$parentid=null,$thunmbnail,$content,$date,$author,$pdo){

    }
}
