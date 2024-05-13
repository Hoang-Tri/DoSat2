<?php
    class Shipping_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->shipping();
        }

        // List ra danh mục bài viết (blog)
        public function shipping() {
            session_start();

            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_cart = 'cart';
            $tbl_tinhthanhpho = 'tbl_tinhthanhpho';

            $categorymodel = $this->load->model("categorymodel");
            $accountmodel = $this->load->model("accountmodel");
            $cartmodel = $this->load->model("cartmodel");
            $addressmodel = $this->load->model("addressmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                header('Location:'.BASE_URL);
            }
            $cond_cart = "cart.acc_id = '$user_id'";

            
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            $data["city"] = $addressmodel->getaddress($tbl_tinhthanhpho);

            // if(isset($_POST['city_id'])) {
            //     $cityId = $_POST['city_id'];
            //     $districts = $addressmodel->getDistrictbyid('tbl_quanhuyen', $cityId);
            //     header('Content-Type: application/json');
            //     echo json_encode($districts);
            // }

            $this->load->view("doctype");
            $this->load->view("shipping/title_shipping");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("shipping/shipping", $data);
            $this->load->view("footer");
        }
        
        public function addtocart() {
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $pro_id = $_POST["pro_id"];
                $acc_id = $_POST["acc_id"];
                $cart_pro_quantity = $_POST["cart_pro_quantity"];
                $cart_pro_title = $_POST["cart_pro_title"];
                $cart_pro_img = $_POST["cart_pro_img"];
                $cart_pro_price = $_POST["cart_pro_price"];
                $cart_brand_name = $_POST["cart_brand_name"];
        
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
                            "cart_pro_title" => $cart_pro_title,
                            "cart_pro_img" => $cart_pro_img,
                            "cart_pro_price" => $cart_pro_price,
                            "cart_brand_name" => $cart_brand_name,
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

        public function getqh() {
            if(isset($_GET['province_id'])) {
                $city_id = $_GET['province_id'];
                $cond = "matp = $city_id";
        
                // Assuming $this->load->model() loads the model and establishes the PDO connection
                $addressmodel = $this->load->model("addressmodel");
                $districts = $addressmodel->getdistrict($city_id, $cond);
        
                // Set content type to JSON
                header('Content-Type: application/json');
        
                $formatted_districts = array(); 
                foreach ($districts as $key => $value) {
                    // Iterate through each fetched row and add its data to the districts array
                    $formatted_districts[] = array(
                        'id' => $value['maqh'],
                        'name' => $value['name']
                    );
                }
                echo json_encode($formatted_districts);
            } else {
                echo json_encode(array('error' => 'No province_id parameter received'));
            }
        }
                    

        public function getxptt() {
            if(isset($_GET['district_id'])) {
                $district_id = $_GET['district_id'];
                $cond = "maqh = '$district_id'";
        
                $addressmodel = $this->load->model("addressmodel");
                $wards = $addressmodel->getwards($district_id, $cond);
        
                // Set content type to JSON
                header('Content-Type: application/json');
        
                $formatted_wards = array(); 
                foreach ($wards as $row) {
                    // Iterate through each fetched row and add its data to the wards array
                    $formatted_wards[] =array(
                        'id' => $row['xaid'],
                        'name' => $row['name']
                    );
                }
                echo json_encode($formatted_wards);
            } else {
                // If no district_id parameter is received, return an error message
                echo json_encode(array('error' => 'No district_id parameter received'));
            }
        }        
    }