<?php
class Category{
    // database connection and table name
    private $con;
    private $table_name = "categories";

    // object properties
    public $id;
    public $name;

    public function __construct($db){
        $this->con = $db;
    }
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT 
                        id,name
                FROM
                    ". $this->table_name ."
                ORDER BY
                        name";
        $stmt = $this->con->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readName(){
        $query = "SELECT name FROM ". $this->table_name ." WHERE id = ? LIMIT 0,1";
        $stmt = $this->con->prepare( $query );
        $stmt->bindparam(1, $this->id);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
    }

}


?>