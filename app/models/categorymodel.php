<?php
    class Categorymodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function category($table, $table_id) {
            $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }

        public function brand($table) {
            $sql = "SELECT * FROM $table ORDER BY $table.brand_id DESC";
            return $this->db->select($sql);
        }

        public function categorybyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        } 
        
        
        // Fee
        public function fee_province($tbl_fee, $tbl_tinhthanhpho, $cond_fee) {
            $sql = "SELECT * FROM $tbl_fee, $tbl_tinhthanhpho WHERE $cond_fee";
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


        //  CATEGORY POST
         public function insertcategory_post($table, $data) {
            return $this->db->insert($table, $data);
         }

         public function cate_post($table, $table_id) {
            $sql = "SELECT * FROM $table ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }

        public function cate_post_home($table) {
            $sql = "SELECT * FROM $table ORDER BY $table.cate_post_id DESC";
            return $this->db->select($sql);
        }

        public function update_cate_post($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
         }

         public function delete_cate_post($table, $cond) {
            return $this->db->delete($table, $cond);
         }

        //  thong ke
        public function statiscial($tbl_statiscial, $cond) {
            $sql = "SELECT * FROM $tbl_statiscial WHERE $cond ORDER BY $tbl_statiscial.sta_date ASC";
            return $this->db->select($sql);
        } 
    }
?>