<?php
namespace App\Controllers;

use App\Models\User;
use PDO;

class AuthController{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function showLoginForm(): void {
        require_once BASE_PATH . "view/auth/login.php";
    }
    public function showRegisterForm(): void {
        require_once BASE_PATH . "view/auth/register.php";
    }
    public function home(): void {
        require_once BASE_PATH . "view/home.php";
    }
    public function login(): void {
        $data = $_POST;
        $error = [];
        $username = trim($data['username']) ?? '';
        $password = $data['password'] ?? '';
        if(empty($username) || empty($password)){
            $error['auth'] = "please fill in all fields!";
            return;
        }
        $userModel = new User($this->pdo);
        $loggedInUser = $userModel->login($username, $password);
        if($loggedInUser){
            session_start();
            $_SESSION['user_id'] = $loggedInUser['id'];
            header('Location: /home');
            exit;
        } else {
            $error['auth'] = "Invalid username or password";
        }
    }
    public function register(): void{
        $data = $_POST;
        $error = [];
        $username = trim($data['username']) ?? '';
        $password = $data['password'] ?? '';
        if(empty($username) || empty($password)) {
            $error['auth'] = "please fill in all fields!";
            return;
        }
        $userModel = new User($this->pdo);
        $created = $userModel->create($username,$password);
        if($created){
            header('Location: /login');
            exit;
        } else {
            $error['auth'] = "Invalid username or password";
        }
    }

}
