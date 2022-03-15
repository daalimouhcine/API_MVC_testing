<?php
    require_once '../models/Post.php';

    class Posts {
        
        public function __construct() {
            $this->postModel = new Post;
        }

        public function read() {
            // $posts = $this->postModel->readPosts();
            // echo json_encode($posts);
            echo 'sfsdfsd';

        }

    }
