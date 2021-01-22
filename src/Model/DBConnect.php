<?php
namespace FinalExam\Model;

use PDO;
use PDOException;

class DBConnect
{
    protected $dsn;
    protected $user;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demomvc;charset=utf8";
        $this->user = "root";
        $this->password = "Minh3032001@";
    }

    public function connect(): PDO
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn,$this->user,$this->password);
            return $conn;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function query($statement): array
    {
        $stmt = $this->connect()->query($statement);
        return $stmt->fetchAll();
    }

    public function execute($statement)
    {
        $stmt = $this->connect()->prepare($statement);
        $stmt->execute();
    }

}