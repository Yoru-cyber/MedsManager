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
            echo "Connected";
        } catch (PDOException $e) {
            echo "Conn failed: " . $e->getMessage();

        }
    }
    public function insertQuery($name, $lastName, $email){

        $sql = "INSERT INTO books(name, lastName, email)
        VALUES('$name', '$lastName', '$email')";
        $this->conn->exec($sql);
    }

    
};

$conn = new dbConn('localhost','root','','myfavBooks');
$userName = $_GET["firstName"];
$userLastname = $_GET["lastName"];
$userEmail =$_GET["email"];
$conn->connect();
$conn->insertQuery($userName, $userLastname, $userEmail);
var_dump($conn);
