<?php
namespace App\Models;

use PDO;
use Exception;
class DataBase {
    private $dbhost;
    private $db;
    private $dbuser;
    private $dbpass;
    public function __construct($dbhost,$db,$dbuser,$dbpass) {
        $this->dbhost = $dbhost;
        $this->db = $db;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }
    public function connect(){
        try {
            $conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->db, $this->dbuser, $this->dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
