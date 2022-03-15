<?php

     /*
     * App Core Class
     * Creates URL & loads core controller
     * URL FORMAT - /controller/method/params 
    */

    class Core{
        private $currentApi = 'Posts';
        private $currentMethod = 'read';
        private $params = [];

        public function __construct() {
            // print_r($this->getUrl());

            $url = $this->getUrl();

            if(!empty($url[0])) {
                // Look in api for first value
                if(file_exists('../api/' . ucwords($url[0]) . '.php')) {
                    // If exists, set as controller
                    $this->currentApi = ucwords($url[0]);
                    //Unset 0 Index
                    unset($url[0]);
                }
            }            
            
            // Require the controller
            require_once '../api/' . $this->currentApi . '.php';
            
            // Instantiate controller class
            $this->currentApi = new $this->currentApi;
            

            // Check for second part of url
            if(!empty($url[1])) {
                // check to see if method exists in controller
                if(method_exists($this->currentApi, $url[1])) {
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }

            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentApi, $this->currentMethod], $this->params);

        }

        public function getUrl() {
            echo $_GET['url'];
            if(isset($_GET['url'])) {
                $url = $_GET['url'];
                $url = rtrim($url, '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }


?>