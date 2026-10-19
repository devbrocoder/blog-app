<?php
namespace App\Models;

use PDO;
use Exception;
class DataBase {
    private $dbhost;
    private $db;
    private $dbuser;
    private $dbpass;
    /**
    * Create a new Database instance.
    *
    * @param string $dbhost The database host address.
    * @param string $db     The database name.
    * @param string $dbuser The database username.
    * @param string $dbpass The database password.
    */
    public function __construct($dbhost,$db,$dbuser,$dbpass) {
        $this->dbhost = $dbhost;
        $this->db = $db;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }
    /**
     * Establish a database connection using PDO.
     *
     * @return PDO|null Returns the PDO instance on success, or null on failure.
     */
    public function connect(): ?PDO{
        try {
            $conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->db, $this->dbuser, $this->dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
