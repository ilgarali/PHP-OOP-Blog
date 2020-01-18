<?php 
class DB {
    private $dbhost = "localhost";
    private $dbname = "blog";
    private $username ="root";
    private $password ="";

    public function __construct()
    {
        if (!isset($this->db)) {
            try {
                $conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
               
                $this->db = $conn;
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
        }
    }

}
