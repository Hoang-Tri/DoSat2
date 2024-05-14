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

        public function province($table, $id) {        
            $sql = "SELECT * FROM $table WHERE matp = $id";
            return $this->db->select($sql); 
        }

        public function district($table, $id) {        
            $sql = "SELECT * FROM $table WHERE maqh = $id";
            return $this->db->select($sql); 
        }

        public function wards($table, $id) {        
            $sql = "SELECT * FROM $table WHERE xaid = $id";
            return $this->db->select($sql); 
        }

        public function getwards($district_id, $cond) {        
            $sql = "SELECT * FROM tbl_xaphuongthitran WHERE $cond";
            return $this->db->select($sql); 
        }

        public function getaddressall($tbl_tinhthanhpho, $tbl_quanhuyen, $tbl_xaphuongthitran) { 
            $cond = "$tbl_tinhthanhpho.matp = $tbl_quanhuyen.matp
                    AND $tbl_quanhuyen.maqh = $tbl_xaphuongthitran.maqh";
            $sql = "SELECT * FROM $tbl_tinhthanhpho, $tbl_quanhuyen, $tbl_xaphuongthitran WHERE $cond";
            
            return $this->db->select($sql); 
        }
        
    }
?>