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
            $this->load->view("home/title_home");
            $this->load->view("header");
            $this->load->view("home/home");
            $this->load->view("footer");
        }

        public function product() {
            $this->load->view("doctype");
            $this->load->view("product_brand/title_product");
            $this->load->view("header");
            $this->load->view("product_brand/product");
            $this->load->view("footer");
        }

        public function product_details() {
            $this->load->view("doctype");
            $this->load->view("product_details/title_product_details");
            $this->load->view("header");
            $this->load->view("product_details/product_details");   
            $this->load->view("footer");
        }

        public function sign_in() {
            $this->load->view("doctype");
            $this->load->view("sign_in/title_sign_in");
            $this->load->view("sign_in/sign_in");   
        }

        public function sign_up() {
            $this->load->view("doctype");
            $this->load->view("sign_up/title_sign_up");
            $this->load->view("sign_up/sign_up");   
        }

        public function notpound() {
            $this->load->view("header");
            $this->load->view("404");
            $this->load->view("footer");
        }
    }
?>