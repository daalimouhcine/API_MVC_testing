<?php

    class Post {
        // DB stuff
        private $conn;
        private $table = 'posts';

        // Post Proprieties
        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $created_at;


        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Posts
        public function read() {
            // Create query
            $query = "SELECT categories.*, posts.* FROM $this->table INNER JOIN categories ON posts.category_id = category.id";

            // Prepare query
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;

        }

    }