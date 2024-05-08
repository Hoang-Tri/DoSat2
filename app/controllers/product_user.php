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
        public function product_brand($id = '') {
            session_start();

            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_product = "product";

            $productmodel = $this->load->model("productmodel");
            $categorymodel = $this->load->model("categorymodel");
            $accountmodel = $this->load->model("accountmodel");
            $postmodel = $this->load->model("postmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id'])) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                header("Location:".BASE_URL);
            }

            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            $data["proinbrand"] = $productmodel->productbyid_home($tbl_brand, $tbl_product, $id);
            
            $this->load->view("doctype");
            $this->load->view("product_brand/title_product");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("product_brand/product", $data);
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
    }
?>