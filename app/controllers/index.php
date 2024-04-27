<?php
    class index extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->homepage();
        }
        // do index ke thua DController ne duoc su dung tat ca cai gi Dctrl su dung
        public function homepage() {
            $this->load->view("doctype");
            $this->load->view("title-home");
            $this->load->view("header");
            $this->load->view("home");
            $this->load->view("footer");
        }

        public function notpound() {
            $this->load->view("header");
            $this->load->view("404");
            $this->load->view("footer");
        }
    }
?>