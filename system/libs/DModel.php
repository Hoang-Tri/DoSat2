<!-- Ket noi co so du lieu -->

<?php
    class DModel {
        
        protected $db = array();
        public function __construct() {
            $connect = "mysql:dbname=dosat2; host=localhost";
            $user = "root";
            $pass  = "";
            $this->db = new Database($connect, $user, $pass);
        }
    }
?>