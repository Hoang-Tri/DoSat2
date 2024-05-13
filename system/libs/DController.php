<?php
    class DController {
        protected $load = array();
        public function __construct() {
            // bien load protected goi class Load
            $this->load = new Load();
        }
    }
?>