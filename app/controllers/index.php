<?php
    class index extends DController {
        public function __construct() {
            $data = array();
            // lay tat ca cua thanh cha
            parent::__construct();
        }
        // do index ke thua DController ne duoc su dung tat ca cai gi Dctrl su dung
        public function homepage() {
            $this->load->view("header");
            $this->load->view("home");
            $this->load->view("footer");
        }
    }
?>