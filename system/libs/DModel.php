<?php
    class DModel {
        
        protected $db = array();
        public function __construct() {
            $connect = "mysql:host=localhost;port=3307;dbname=dosat2";
            $user = "root";
            $pass  = "";
            $this->db = new Database($connect, $user, $pass);
        }
    }