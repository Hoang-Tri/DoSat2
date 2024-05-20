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
            if(isset($_SESSION['cus_id'])) {
                $cus_id = $_SESSION['cus_id'];
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

            if(!empty($data['cart'])) {
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

        public function add_coupon() {
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $coupon_code = $_POST['coupon_code'];

                $table = 'coupon';

                $couponmodel = $this->load->model("couponmodel");
                $cond_coupon = "$table.coupon_code = '$coupon_code'";

                // Kiem tra xem co trong du lieu chua 
                $coupon = $couponmodel->couponbycode($table, $cond_coupon);

                if(!empty($coupon)) {
                    if(isset($_SESSION['coupon'])) {
                        unset($_SESSION['coupon']);
                        $_SESSION['coupon'] = [
                            'form' => $coupon[0]['coupon_form'],
                            'sale' => $coupon[0]['coupon_sale'],
                            'times' => $coupon[0]['coupon_times']
                        ];
                    }else {
                        $_SESSION['coupon'] = [
                            'form' => $coupon[0]['coupon_form'],
                            'sale' => $coupon[0]['coupon_sale'],
                            'times' => $coupon[0]['coupon_times']
                        ];
                    }
                    $message = "Áp dụng thành công!";
                    header("Location:".BASE_URL."/payment_user?msg=".$message);
                    exit();
                }else {
                    $error = "Không tồn tại mã khuyến mãi này vui lòng nhập lại!";
                    header("Location:".BASE_URL."/payment_user?error=".$error);
                    exit();
                }
            }
        }
    }
?>