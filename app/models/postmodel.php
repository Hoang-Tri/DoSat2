<?php
    class Postmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function post($table_cate_post, $table_cate_post_id) {
            $sql = "SELECT * FROM $table_cate_post ORDER BY $table_cate_post_id DESC";
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

        public function postbyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        } 
        
        public function postbyid_home($tbl_post, $tbl_cate_post, $id) {
            $sql = "SELECT * FROM $tbl_post, $tbl_cate_post 
            WHERE $tbl_post.cate_post_id = $tbl_cate_post.cate_post_id
            AND $tbl_post.cate_post_id = '$id';
            ORDER BY $tbl_post.post_id DESC";
            return $this->db->select($sql); 
        } 

        public function insertpost($table, $data) {
           return $this->db->insert($table, $data);
        }

        public function updatepost($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function deletepost($table, $cond) {
            return $this->db->delete($table, $cond);
         }

        //  chi tiet tin tuc tai day
        public function post_details($tbl_post, $tbl_cate_post, $cond) {
            $sql = "SELECT * FROM $tbl_post, $tbl_cate_post 
            WHERE $cond ORDER BY $tbl_post.post_id DESC";
            return $this->db->select($sql); 
        }

        public function related_post_home($tbl_post, $tbl_cate_post, $cond_related) {
            $sql = "SELECT * FROM $tbl_post, $tbl_cate_post 
            WHERE $cond_related ORDER BY $tbl_post.post_id DESC";
            return $this->db->select($sql);
        }
    }
?>