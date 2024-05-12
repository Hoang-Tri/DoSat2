<?php
    class   Addressmodel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function getaddress($table ){
            $sql = "SELECT * FROM $table ORDER BY $table.matp DESC";
            return $this->db->select($sql);
        }
    }
?>