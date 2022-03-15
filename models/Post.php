<?php
    require_once '../config/Database.php';

    class Post {

        public function __construct() {
            $this->db = new Database;
        }


        public function readPosts() {
            $this->db->query('SELECT * FROM posts');
            $posts = $this->db->resultSet();

            return $posts;
        }


    }