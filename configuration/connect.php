<?php
define('HOST', 'localhost');
define('DATABASE', 'simplesystem');
define('USER', 'root');
define('PASSWORD', '');

class Connect{
    protected $connection;

    function __construct(){
        $this->connectDatabase();
    }

    function connectDatabase(){
        try{
            $this->connection = new PDO('mysql:host'.HOST.';dbname='.DATABASE, USER, PASSWORD);
        }
        catch(PDOException $e){
            echo "Error!: ".$e->getMessage();
            die();
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}
?>