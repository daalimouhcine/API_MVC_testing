<?php
    
    class Database {
        private $host = 'localhost';
        private $dbname = 'api_test';
        private $root = 'root';
        private $password = '';
        private $conn;

        // DB connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->root, $this->password);
                $this->conn->getAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                echo 'Connect Error: ' . $e->getMessage(); 
            }
            return $this->conn;
        }
    }