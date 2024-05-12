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
            $tbl_cart = 'cart';
            
            // Load các model
            $categorymodel = $this->load->model("categorymodel");            
            $productmodel = $this->load->model("productmodel");
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
            $data["productall"] = $productmodel->productall_home($tbl_product, $tbl_brand);
            
            

            $this->load->view("doctype");
            $this->load->view("home/title_home");
            
            // Kiểm tra session để hiển thị header phù hợp
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            } else {
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