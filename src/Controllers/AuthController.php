<?php
namespace App\Controllers;

use App\Models\User;

class AuthController{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function showLoginForm() {
        require_once BASE_PATH . "view/auth/login.php";
    }
    public function showRegisterForm() {
        require_once BASE_PATH . "view/auth/register.php";
    }
    public function home(){
        require_once BASE_PATH . "view/home.php";
    }
    public function login($data){
        $error = [];
        $username = trim($data['username']) ?? '';
        $password = $data['password'] ?? '';
        if(empty($username) || empty($password)){
            $error['auth'] = "please fill in all fields!";
            return ['status' => 'error', 'error' => $error];
        }
        $userModel = new User($this->pdo);
        $loggedInUser = $userModel->login($username, $password);
        if($loggedInUser){
            return ['status' => 'success', 'message' => 'Logged in succesfully'];
        } else {
            $error['auth'] = "Invalid username or password";
            return ['status' => 'error', 'error' => $error];
        }
    }
    public function register($data){
        $error = [];
        $username = trim($data['username']) ?? '';
        $password = $data['password'] ?? '';
        if(empty($username) || empty($password)) {
            $error['auth'] = "please fill in all fields!";
            return ['status' => 'error', $error];
        }
        $hashed_pass = password_hash($password);
        $userModel = new User($this->pdo);
        $loggedInUser = $userModel->create($username,$hashed_pass);
        if($loggedInUser){ 
            return ['status' => 'success', 'message' => 'Logged in succesfully'];
        } else {
            $error['auth'] = "Invalid username or password";
            return ['status' => 'error', 'error' => $error];
        }
    }

}
