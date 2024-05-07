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
        //Lấy ra sản phẩm
        public function productbyid_home($tbl_product, $id) {
            $sql = "SELECT * FROM $tbl_product
            WHERE $tbl_product.pro_id = '$id';
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
    }
?>