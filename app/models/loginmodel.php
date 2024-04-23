<?php
    class Loginmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function login($tbl_admin, $username, $password) {
            $sql = "SELECT * FROM $tbl_admin WHERE ad_username = ? AND ad_password = ?";
            return $this->db->affectedRows($sql, $username, $password);
        }

        
        public function getlogin($tbl_admin, $username, $password) {
            $sql = "SELECT * FROM $tbl_admin WHERE ad_username = ? AND ad_password = ?";
            return $this->db->selectUser($sql, $username, $password);
        }
        
    }
?>