<?php
    class Ordermodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function list_order($tbl_order, $order_id){
            $sql = "SELECT * FROM $tbl_order ORDER BY $order_id DESC";
            return $this->db->select($sql);
        }

        public function list_order_user($tbl_order_details, $tbl_cus, $tbl_product, $cond_order){
            $sql = "SELECT * FROM $tbl_order_details, $tbl_cus, $tbl_product  WHERE $cond_order GROUP BY $tbl_order_details.order_code";
            return $this->db->select($sql);
        }

        public function list_order_details($tbl_order_details, $tbl_product, $tbl_cus, $cond){
            $sql = "SELECT * FROM $tbl_order_details, $tbl_product, $tbl_cus WHERE $cond";
            return $this->db->select($sql);
        }

        public function list_order_details_user($tbl_order_details, $tbl_product, $tbl_brand, $cond){
            $sql = "SELECT * FROM $tbl_order_details, $tbl_product, $tbl_brand WHERE $cond";
            return $this->db->select($sql);
        }

        public function insert_order($table, $data){
            return $this->db->insert($table,$data);
        }

        public function insert_order_details($table, $data){
            return $this->db->insert($table,$data);
        }

        public function update_order_status($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
        }
    }
?>