<?php
    class Product_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->product_brand();
        }

        // Sản phẩm theo thương hiệu
        public function product_brand() {
            $tbl_brand = "brand";
            $tbl_post = "category_post";

            $categorymodel = $this->load->model("categorymodel");

            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $this->load->view("doctype");
            $this->load->view("product_brand/title_product");
            $this->load->view("header", $data);
            $this->load->view("product_brand/product");
            $this->load->view("footer");
        }

        // Chi tiết sản phẩm tại đây
        public function product_details($id = '') {
            $tbl_brand = "brand";
            $tbl_post = "category_post";

            $categorymodel = $this->load->model("categorymodel");

            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $this->load->view("doctype");
            $this->load->view("product_details/title_product_details");
            $this->load->view("header" ,$data);
            $this->load->view("product_details/product_details");   
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