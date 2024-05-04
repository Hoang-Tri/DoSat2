<?php
    class productmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function product($table){
            $sql = "SELECT * FROM $table ORDER BY pro_id DESC";
            return $this->db->select($sql);
        }
        public function insertproduct($table, $data){
            return $this->db->insert($table,$data);
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
    }
?>