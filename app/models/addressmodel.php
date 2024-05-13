<?php
    class   Addressmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function getaddress($table){
            $sql = "SELECT * FROM $table ORDER BY $table.matp DESC";
            return $this->db->select($sql);
        }

        public function getdistrict($city_id, $cond) {        
            $sql = "SELECT * FROM tbl_quanhuyen WHERE $cond";
            return $this->db->select($sql); 
        }

        public function getwards($district_id, $cond) {        
            $sql = "SELECT * FROM tbl_xaphuongthitran WHERE $cond";
            return $this->db->select($sql); 
        }
        
    }
?>