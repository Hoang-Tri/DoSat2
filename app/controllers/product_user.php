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
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
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
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("product_details/product_details");   
            $this->load->view("footer");
        }
        //Lấy ra tất cả sản phẩm
        public function allproduct(){
            $tbl_product = "product";
            $tbl_brand = "brand";

            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["allproduct"] = $productmodel->product_home($tbl_product);

            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("home/home", $data);
            $this->load->view("footer");
        }
    }
?>