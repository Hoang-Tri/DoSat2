<?php
    class Postmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function post($table_cate_post, $table_cate_post_id) {
            $sql = "SELECT * FROM $table_cate_post ORDER BY $table_cate_post_id DESC";
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

        public function insertpost($table, $data) {
           return $this->db->insert($table, $data);
        }

        public function updatepost($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function deletepost($table, $cond) {
            return $this->db->delete($table, $cond);
         }
    }
?>