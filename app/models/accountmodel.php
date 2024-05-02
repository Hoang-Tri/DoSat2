<?php
    class Accountmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function account($tbl_account) {
            $sql = "SELECT * FROM $tbl_account ORDER BY acc_id DESC";
            return $this->db->select($sql);
        }

        public function getAccountById($accId) {
            $sql = "SELECT * FROM account WHERE acc_id = :acc_id";
            return $this->db->getAccount($sql, $accId);
        }
    

        public function insert_signup($table, $data) {
           return $this->db->insert($table, $data);
        }
        
        public function login($tbl_account, $email, $password) {
            $sql = "SELECT * FROM $tbl_account WHERE acc_email = ? AND acc_password = ?";
            return $this->db->affectedRows($sql, $email, $password);
        }

        public function getlogin($tbl_account, $email, $password) {
            $sql = "SELECT * FROM $tbl_account WHERE acc_email = ? AND acc_password = ?";
            return $this->db->selectUser($sql, $email, $password);
        }

        public function checkemail($table, $email) {
            // Chuẩn bị câu truy vấn SQL
            $sql = "SELECT COUNT(*) AS num_rows FROM $table WHERE acc_email = :email";
            return $this->db->checkemail($sql, $email);
        }
        
    }
?>