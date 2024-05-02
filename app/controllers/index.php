<?php
    class index extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->homepage();
        }
        public function homepage() {
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            
            $categorymodel = $this->load->model("categorymodel");            
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            
            
            $this->load->view("doctype");
            $this->load->view("home/title_home");
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("home/home");
            $this->load->view("footer");
        }

        public function notpound() {
            $this->load->view("doctype");
            $this->load->view("home/title_home");
            $this->load->view("header");
            $this->load->view("404");
            $this->load->view("footer");
        }
    }
?>