<?php

namespace Core;

use \PDO;
use \PDOException;

class Database {
    private $host = DB_HOST;
    private $dbname = DB_DATABASE;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;

    private $conn;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($params, $value, $type = null)
    {
        if(is_null($type)) {
            switch(true) {
                case is_int($type):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($type):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultOne()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function resultAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rows()
    {
        $this->execute();

        if($this->stmt->rowCount()) {
            return $this->stmt->rowCount();
        }

        return 0;
    }
}