<?php
    class order extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            Session::checkSession();
            parent::__construct();
        }

       
        public function index() {
            $this->order();
        }


        // List ra các đơn hàng
        public function order() {
             // Kiem tra xem session login co hay khong
             $this->load->view("admin/header");
             $this->load->view("admin/sidebar");
             $this->load->view("admin/order/order");
             $this->load->view("admin/footer");
        }
    }
?>