<?php
    class Payment_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->payment();
        }
        public function payment() {
            session_start();
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            $tbl_cart = 'cart';
            $tbl_cus = 'customer';
            
            // Load các model
            $categorymodel = $this->load->model("categorymodel");            
            $accountmodel = $this->load->model("accountmodel");
            $cartmodel = $this->load->model("cartmodel");
            $cusmodel = $this->load->model("cusmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                $user_id = -1;
            }

            // kiểm tra xem có tồn tại id của khách hàng không
            if(isset($_POST['cus_id'])) {
                $cus_id = $_POST['cus_id'];
            }else {
                header("Location: ".BASE_URL.'/shipping_user');
            }

            $cond_cart = "cart.acc_id = '$user_id'";
            $cond_cus = "customer.cus_id = '$cus_id'";

            
            // Lấy dữ liệu từ các bảng
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $data["customer"] = $cusmodel->cusbyid($tbl_cus, $cond_cus);

            if(!empty($data['cart']) && !empty($data['customer'])) {
                $this->load->view("doctype");
                $this->load->view("payment/title_payment");
                
                // Kiểm tra session để hiển thị header phù hợp
                if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                    $this->load->view("header_login", $data);
                } else {
                    $this->load->view("header", $data);
                }
                
                $this->load->view("payment/payment", $data);
                $this->load->view("footer");
            }else {
                header("Location: ".BASE_URL);
            }
        }
    }
?>