<?php
    class Cart_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->cart();
        }

        // List ra danh mục bài viết (blog)
        public function cart() {
            session_start();

            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";

            $categorymodel = $this->load->model("categorymodel");
            $accountmodel = $this->load->model("accountmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id'])) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }


            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            
            $this->load->view("doctype");
            $this->load->view("cart/title_cart");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("cart/cart");
            $this->load->view("footer");
        }
    }
?>