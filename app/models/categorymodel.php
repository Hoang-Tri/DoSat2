<?php
    class Categorymodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function category($table, $table_id) {
            $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }

        public function categorybyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        }   

        public function insertcategory($table, $data) {
           return $this->db->insert($table, $data);
        }

        public function updatecategory($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function deletecategory($table, $cond) {
            return $this->db->delete($table, $cond);
         }


        //  POST
         public function insertcategory_post($table, $data) {
            return $this->db->insert($table, $data);
         }

         public function cate_post($table, $table_id) {
            $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }

        public function update_cate_post($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function delete_cate_post($table, $cond) {
            return $this->db->delete($table, $cond);
         }
    }
?>