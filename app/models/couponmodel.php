<?php
    class Couponmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function insertcoupon($table, $data){
            return $this->db->insert($table,$data);
        }

        public function coupon($table) {
            $sql = "SELECT * FROM $table ORDER BY coupon_id DESC";
            return $this->db->select($sql);
        }

        public function couponbycode($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        } 
    }
?>