<?php
    class Favorite_user extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            $this->favorite();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function favorite() {
            session_start();
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            $tbl_cart = 'cart';
            
            $categorymodel = $this->load->model("categorymodel");     
            $accountmodel = $this->load->model("accountmodel");
            $cartmodel = $this->load->model("cartmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                $user_id = -1;
            }

            $cond_cart = "cart.acc_id = '$user_id'";

            
            // Lấy dữ liệu từ các bảng
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);
            
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);

            $this->load->view("doctype");
            $this->load->view("favorite/title_favorite");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("favorite/favorite", $data);
            $this->load->view("footer");
        }        
    }