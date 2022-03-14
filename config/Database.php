<?php

    class Database{
        private $host = 'localhost';
        private $dbName = 'myblog';
        private $root = 'root';
        private $password = '';

        public $conn;

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->root, $this->password);
                $this->conn->getAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
        }
    }