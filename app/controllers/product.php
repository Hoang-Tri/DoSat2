<?php
    class product extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            Session::checkSession();
            parent::__construct();
        }

       
        public function index() {
            $this->product();
        }


        // List ra các đơn hàng
        public function product() {
             // Kiem tra xem session login co hay khong
             $this->load->view("admin/header");
             $this->load->view("admin/sidebar");
             $this->load->view("admin/product/product");
             $this->load->view("admin/footer");
        }
    }
?>