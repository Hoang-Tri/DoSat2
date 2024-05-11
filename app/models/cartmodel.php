<?php
    class Cartmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function cart($tbl_cart) {
            $sql = "SELECT * FROM $tbl_cart ORDER BY $tbl_cart.cart_id DESC";
            return $this->db->select($sql); 
        }

        public function post_home($tbl_post) {
            $sql = "SELECT * FROM $tbl_post ORDER BY $tbl_post.post_id DESC";
            return $this->db->select($sql); 
        }

        public function listpost($table_post, $table_cate_post) {
            $sql = "SELECT * FROM $table_post, $table_cate_post 
            WHERE $table_post.cate_post_id = $table_cate_post.cate_post_id
            ORDER BY $table_post.post_id DESC";
            return $this->db->select($sql); 
        }

        public function cartbyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond LIMIT 1";
            return $this->db->select($sql);
        } 
        
        public function postbyid_home($tbl_post, $tbl_cate_post, $id) {
            $sql = "SELECT * FROM $tbl_post, $tbl_cate_post 
            WHERE $tbl_post.cate_post_id = $tbl_cate_post.cate_post_id
            AND $tbl_post.cate_post_id = '$id';
            ORDER BY $tbl_post.post_id DESC";
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

        //  chi tiet tin tuc tai day
        public function cart_acc($tbl_cart, $tbl_product, $cond) {
            $sql = "SELECT * FROM $tbl_cart, $tbl_product 
            WHERE $tbl_cart.pro_id = $tbl_product.pro_id
            AND $cond ORDER BY $tbl_cart.cart_id DESC";
            return $this->db->select($sql); 
        }
    }
?>