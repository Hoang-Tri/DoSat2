<?php
    class Cusmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function insertcus($table, $data){
            return $this->db->insert($table,$data);
        }

        public function customer($customer, $cond) {
            $sql = "SELECT * FROM $customer WHERE $cond ORDER BY cus_id DESC";
            return $this->db->select($sql);
        }

        public function cusbyid($table, $cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        } 
    }
?>