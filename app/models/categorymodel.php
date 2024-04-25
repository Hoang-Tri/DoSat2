<?php
    class Categorymodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function category($table, $table_id) {
            $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }

        public function categorybyid($table, $id) {
            $sql = "SELECT * FROM $table WHERE cate_pro_id =:id";
            $data = array(":id" => $id);
            return $this->db->select($sql, $data);
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
    }
?>