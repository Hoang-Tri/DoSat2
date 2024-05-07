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
            session_start();
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            $tbl_product = "product";
            
            $categorymodel = $this->load->model("categorymodel");            
            $productmodel = $this->load->model("productmodel");            
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $data["productall"] = $productmodel->productall_home($tbl_product, $tbl_brand);
            
            

            $this->load->view("doctype");
            $this->load->view("home/title_home");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("home/home", $data);
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