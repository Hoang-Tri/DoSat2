<?php
    class Accountmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        // public function category($table, $table_id) {
        //     $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
        //     return $this->db->select($sql);
        // }

        // public function brand($table) {
        //     $sql = "SELECT * FROM $table ORDER BY $table.brand_id DESC";
        //     return $this->db->select($sql);
        // }

        // public function categorybyid($table, $cond) {
        //     $sql = "SELECT * FROM $table WHERE $cond";
        //     return $this->db->select($sql);
        // }   

        public function insert_signup($table, $data) {
           return $this->db->insert($table, $data);
        }

        public function check_email_exists($table, $email) {
            $sql = "SELECT COUNT(*) AS num_rows FROM $table WHERE acc_email = :email";
            return $this->db->checkMatchEmail($sql, $email);
        }
        
        public function login($tbl_account, $email, $password) {
            $sql = "SELECT * FROM $tbl_account WHERE acc_email = ? AND acc_password = ?";
            return $this->db->affectedRows($sql, $email, $password);
        }

        public function getlogin($tbl_account, $email, $password) {
            $sql = "SELECT * FROM $tbl_account WHERE acc_email = ? AND acc_password = ?";
            return $this->db->selectUser($sql, $email, $password);
        }

        // public function updatecategory($table, $data, $cond) {
        //     return $this->db->update($table, $data, $cond);
        //  }

        //  public function deletecategory($table, $cond) {
        //     return $this->db->delete($table, $cond);
        //  }


        // //  CATEGORY POST
        //  public function insertcategory_post($table, $data) {
        //     return $this->db->insert($table, $data);
        //  }

        //  public function cate_post($table, $table_id) {
        //     $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
        //     return $this->db->select($sql);
        // }

        // public function cate_post_home($table) {
        //     $sql = "SELECT * FROM $table ORDER BY $table.cate_post_id DESC";
        //     return $this->db->select($sql);
        // }

        // public function update_cate_post($table, $data, $cond) {
        //     return $this->db->update($table, $data, $cond);
        //  }

        //  public function delete_cate_post($table, $cond) {
        //     return $this->db->delete($table, $cond);
        //  }
    }
?>