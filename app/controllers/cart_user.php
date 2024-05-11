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

            
            $data["cart"] = $cartmodel->cart_acc($tbl_cart,"product", $cond_cart);
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            
            $this->load->view("doctype");
            $this->load->view("cart/title_cart");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("cart/cart", $data);
            $this->load->view("footer");
        }
        
        public function addtocart() {
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $pro_id = $_POST["pro_id"];
                $acc_id = $_POST["acc_id"];
                $cart_pro_quantity = $_POST["cart_pro_quantity"];
        
                $table = "cart";
                $cond = "pro_id = '$pro_id' AND acc_id = '$acc_id'";
                $cartmodel = $this->load->model("cartmodel");

                $get_cart = $cartmodel->cartbyid($table, $cond);

                if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                    if($get_cart) {
                        foreach ($get_cart as $key => $value) {
                            $data = array(
                                "cart_pro_quantity" => $value['cart_pro_quantity'] + 1
                            );
                        }
                        
                        $result = $cartmodel->updatecart($table, $data, $cond);
                    } else{
                        $data = array(
                            "pro_id" => $pro_id,
                            "acc_id" => $acc_id,
                            "cart_pro_quantity" => $cart_pro_quantity
                        );
                        $result = $cartmodel->insertcart($table, $data);
                    }
                    if($result == 1) {
                        $message = "Thêm vào thành công";
                        header("Location:".BASE_URL."/cart_user?msg=".$message);
                        exit();
                    } else {
                        $error = "Thêm vào thất bại!";
                        header("Location:".BASE_URL."/cart_user?error=".$error);
                        exit();
                    }
                }else {
                    $message = "Vui lòng đăng nhập trước khi mua hàng";
                    header("Location:".BASE_URL."/account_user?msg=".$message);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/cart_user");
                exit();
            }
        }

    }
?>