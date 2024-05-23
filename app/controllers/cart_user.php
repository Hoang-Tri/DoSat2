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

            
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);
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
                if(isset($_SESSION['acc_id'])) {
                    $acc_id = $_SESSION['acc_id'];
                }  else {
                    $acc_id = '';
                }

                // Lấy dữ liệu từ biểu mẫu
                $pro_id = $_POST["pro_id"];
                $cart_pro_quantity = $_POST["cart_pro_quantity"];
                $cart_pro_title = $_POST["cart_pro_title"];

                $cart_pro_img = $_POST["cart_pro_img"];

                // Kiểm tra xem có dấu '/' trong chuỗi hay không
                if (strpos($cart_pro_img, '/') !== false) {
                    // Nếu có dấu '/', lấy phần tử sau cùng
                    $parts = explode('/', $cart_pro_img);
                    $result_pro_img = end($parts);
                } else {
                    // Nếu không có dấu '/', giữ nguyên chuỗi
                    $result_pro_img = $cart_pro_img;
                }


                $cart_pro_price = $_POST["cart_pro_price"];
                $cart_brand_name = $_POST["cart_brand_name"];
                $cart_pro_size = $_POST["cart_pro_size"];

                // kiem tra neu size khong duoc chon thi se khong 
                if(empty($cart_pro_size)) {
                    header('Location: '.BASE_URL."/product_user/product_details/".$pro_id);
                    exit();
                }
        
                $table = "cart";
                $cond = "cart.pro_id = '$pro_id' AND cart.acc_id = '$acc_id' AND cart.cart_pro_size = '$cart_pro_size'";
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
                            "cart_pro_title" => $cart_pro_title,
                            "cart_pro_img" => $result_pro_img,
                            "cart_pro_price" => $cart_pro_price,
                            "cart_brand_name" => $cart_brand_name,
                            "cart_pro_quantity" => $cart_pro_quantity,
                            "cart_pro_size" => $cart_pro_size
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

        public function delete_cart($id) {
            $cartmodel = $this->load->model("cartmodel");
            $table = "cart";
            $cond = "cart.cart_id = '$id'";
        
            $result = $cartmodel->deletecart($table, $cond);
            
            if($result == 1) {
                header("Location:".BASE_URL."/cart_user");
                exit();
            } else {
                header("Location:".BASE_URL);
                exit();
            }
        }

        public function update_cart($id) {
            $cartmodel = $this->load->model("cartmodel");
            $table = "cart";
            $cond = "cart.cart_id = '$id'";

            $cart_pro_quantity = $_POST["cart_pro_quantity"];
            $data = array(
                "cart_pro_quantity" => $cart_pro_quantity
            );
            
            $result = $cartmodel->updatecart($table, $data, $cond);
            if($result == 1) {
                header("Location:".BASE_URL."/cart_user");
                exit();
            } else {
                header("Location:".BASE_URL);
                exit();
            }
        }

    }
?>