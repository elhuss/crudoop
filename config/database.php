<?php
class Database{
    // your own db credentials
    private $host = "localhost";
    private $db_name = "oopcrud";
    private $username = "root";
    private $password = "";
    public $con;
    // get the database connection
    public function getConnection(){
        $this->con = null;
        try{
            $this->con = new PDO("mysql:host=". $this->host .";dbname=". $this->db_name, $this->username,$this->password);
        }catch(PDOException $e){
            echo "connection error :" . $e->getMessage();
        }
        return $this->con;
    }
}
?>