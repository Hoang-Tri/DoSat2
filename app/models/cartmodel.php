<?php
    class Cartmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function cart($tbl_cart, $cond) {
            $sql = "SELECT * FROM $tbl_cart WHERE $cond ORDER BY $tbl_cart.cart_id DESC";
            return $this->db->select($sql); 
        }

        public function post_home($tbl_post) {
            $sql = "SELECT * FROM $tbl_post ORDER BY $tbl_post.post_id DESC";
            return $this->db->select($sql); 
        }

        public function cartbyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond LIMIT 1";
            return $this->db->select($sql);
        } 
        

        public function insertcart($table, $data) {
           return $this->db->insert($table, $data);
        }

        public function updatecart($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function deletecart($table, $cond) {
            return $this->db->delete($table, $cond);
         }
    }
?>