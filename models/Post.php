<?php
    require_once '../config/Database.php';

    class Post {

        public function __construct() {
            $this->db = new Database;
        }


        public function readPosts() {
            $query = $this->db->prepare('SELECT * FROM posts');
            $stmt = $query->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        }


    }