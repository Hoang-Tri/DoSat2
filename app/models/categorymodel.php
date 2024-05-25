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
            $sql = "SELECT 
                        sta_date, 
                        SUM(sta_statistic) AS revenua, 
                        COUNT(sta_order_id) AS count_order, 
                        SUM(sta_quantity) AS quantity 
                    FROM 
                        $tbl_statiscial 
                    WHERE 
                        $cond
                    GROUP BY 
                        sta_date";
        
            return $this->db->select($sql);
        }

        public function statiscial_product($tbl_product, $tbl_order_details, $cond) {
            $sql = "SELECT p.pro_title AS title, SUM(o.order_details_quantity) AS quantity,
                       SUM(o.order_details_quantity * p.pro_price) AS price
                    FROM $tbl_order_details o
                    JOIN $tbl_product p ON o.pro_id = p.pro_id
                    GROUP BY p.pro_title
                    ORDER BY quantity DESC";
            return $this->db->select($sql);
        }
        
    }
?>