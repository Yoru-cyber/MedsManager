<?php
declare(strict_types=1);

class dbConn
{

    private string $serverName;
    private string $userName;
    private string $passwordConn;
    private string $database;
    private $conn;
    public function __construct($Sname, $user, $pass, $db)
    {

        $this->serverName = $Sname;
        $this->userName = $user;
        $this->passwordConn = $pass;
        $this->database = $db;


    }
    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->passwordConn);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        } catch (PDOException $e) {
            echo "Conn failed: " . $e->getMessage();

        }
    }
    public function insertQuery($name, $lastName, $email){
        
        $sql = "INSERT INTO books(name, lastName, email)
        VALUES('$name', '$lastName', '$email')";
        $this->conn->exec($sql);
    }
    public function retriveQuery(){
//docs say to use the method prepare to return an array with the results
//so this far easier and less abstract way to get data from the DB
//def worth investigating more
        $sql = $this->conn->prepare('SELECT name, lastName, email, id FROM books');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
        
         
    }
    
};



