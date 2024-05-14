<?php
    class productmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function product($table, $table_brand_id){
            $sql = "SELECT * FROM $table ORDER BY $table_brand_id DESC";
            return $this->db->select($sql);
        }
        public function insertproduct($table, $data){
            return $this->db->insert($table,$data);
        }
        public function listproduct($table, $table_brand) {
            $sql = "SELECT * FROM $table, $table_brand 
            WHERE $table.pro_brand_id = $table_brand.brand_id
            ORDER BY $table.pro_id DESC";
            return $this->db->select($sql); 
        }
        public function brand($table_brand, $table_id) {
            $sql = "SELECT * FROM $table_brand ORDER BY $table_id DESC";
            return $this->db->select($sql);
        }
        public function productbyid($table,$cond){
            $sql = "SELECT * FROM $table where $cond";
            return $this->db->select($sql);
        }
        public function updateproduct($table,$data,$cond){
            return $this->db->update($table,$data,$cond);
        }
        public function deleteproduct($table,$cond){
            return $this->db->delete($table,$cond);
        }
        public function productbyid_home($tbl_brand, $tbl_product, $id) {
            $sql = "SELECT * FROM $tbl_brand, $tbl_product 
            WHERE $tbl_product.pro_brand_id = $tbl_brand.brand_id
            AND $tbl_product.pro_brand_id = '$id';
            ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql); 
        } 
        public function productall_home($tbl_product, $table_brand) {
            $sql = "SELECT * FROM $tbl_product, $table_brand 
            WHERE $tbl_product.pro_brand_id = $table_brand.brand_id;
            ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql); 
        } 

        public function product_home($tbl_product){
            $sql = "SELECT * FROM $tbl_product ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql);
        }
        
        //San pham new
        public function productall_new($tbl_product,$table_brand){
            $sql = "SELECT * FROM $tbl_product, $table_brand 
            WHERE $tbl_product.pro_brand_id = $table_brand.brand_id;
            ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql); 
        }
        //Chi tiet san pham
        public function product_details($tbl_product, $tbl_brand, $cond) {
            $sql = "SELECT * FROM $tbl_product, $tbl_brand 
            WHERE $cond ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql); 
        }

        public function related_product_home($tbl_product, $tbl_brand, $cond_related) {
            $sql = "SELECT * FROM $tbl_product, $tbl_brand 
            WHERE $cond_related ORDER BY $tbl_product.pro_id DESC";
            return $this->db->select($sql);
        }

        public function getId($tbl_product, $id) {
            $sql = "SELECT COUNT(*) AS num_rows FROM $tbl_product WHERE pro_id = :id";
            return $this->db->checkid($sql, $id);
        }

        public function cart_pro_size($table){
            $sql = "SELECT * FROM $table ORDER BY $table.size_id DESC";
            return $this->db->select($sql);
        }
    }
?>