<?php
namespace App\Models;
use PDO;
class User {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function create(string $uname,string $upassw): array|false{
        $name = trim($uname);
        $pass = password_hash($upassw,PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (username,password_hash,created_at) VALUES (:username, :password_hash, :created_at)');
        $stmt->execute(['username' => $name, 'password_hash' => $pass, 'created_at' => time()]);
        if($stmt){
            return $stmt;
        }
        return false;
    }
    public function delete(int $uid): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(["id" => $uid]);
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    /**
     *
     * @param array $data
     */
    public function update(?int $uid,array $data): array|false{
        $stmt = $this->pdo->prepare('UPDATE users SET username = :username WHERE id = :id');
        $success = $stmt->execute(['id'=>$uid,'username'=>$data['username']]);
        if($success){
            return $success;
        }
        return false;
    }
    public function getById(?int $uid): array|false{
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id'=>$uid]);
        if ($stmt) {
          return  $stmt->fetch();
        }
        return false;
    }
    /**
     *
     * @param array $filters
     */
    public function getAllUser(int $page = 1, int $perPage = 10, array $filters = []): array {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT id, username, email, created_at FROM users WHERE 1=1";
        $bindValues = [];
        if(!empty($filters['search'])){
            $sql .= " AND (username LIKE :search OR email LIKE :search)";
            $bindValues['search'] = '%' . $filters['search'] . '%';
        }
        if (!empty($filters['status'])) {
            $sql .= " AND status = :status";
            $bindValues['status'] = $filters['status'];
        }
        $sql .= " LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        foreach ($bindValues as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue('limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function login(string $uname,string $upassw): array|false{
        $stmt = $this->pdo->prepare("SELECT id,password_hash FROM users WHERE username = :username");
        $stmt->execute(["username" => $uname]);
        $userRecord = $stmt->fetch();
        if(!$userRecord){
            return false;
        }
        if(password_verify($upassw,$userRecord['password_hash'])){
            return $userRecord;
        }
        return false;
    }
}
