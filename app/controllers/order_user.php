<?php
    class Order_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->order();
        }
        public function order() {
            session_start();
            unset($_SESSION['coupon']);
            if(isset($_POST['cus_id'])) {
                $order_code = rand(0, 99999);
                $cus_id = $_POST['cus_id'];
                $order_details_fee = $_POST['order_details_fee'];
                $order_details_coupon = $_POST['order_details_coupon'];
                $sta_statistic = $_POST['sta_statistic'];

                // chuan bi cho data
                date_default_timezone_set('asia/ho_chi_minh');
                $date = date('Y-m-d');
                $hour = date('h:i:sa');
                $order_date = $date.$hour;

                $data_order = array(
                    'order_status' => 0,
                    'order_code' => $order_code,
                    'order_date' => $date.' '.$hour,
                );

                $ordermodel = $this->load->model("ordermodel");
                $cartmodel = $this->load->model("cartmodel");
                $productmodel = $this->load->model("productmodel");
                $result_order = $ordermodel->insert_order('m_order', $data_order);

                // kiem tra gio hang
                $user_id = $_SESSION['acc_id'];
                $cond_cart = "cart.acc_id = '$user_id'";
                $tbl_cart = 'cart';
                $tbl_product = 'product';


                $cart = $cartmodel->cart($tbl_cart, $cond_cart);
                if(!empty($cart)) {
                    foreach($cart as $key => $value) {
                        $order_details_price = $value['cart_pro_price'] * $value['cart_pro_quantity'];
                        $data_order_details = array(
                            'order_code' => $order_code,
                            'pro_id' => $value['pro_id'],
                            'order_details_quantity' => $value['cart_pro_quantity'],
                            'order_details_size' => $value['cart_pro_size'],
                            'order_details_price' => $order_details_price,
                            'cus_id' => $cus_id,
                            'order_details_fee' => $order_details_fee,
                            'order_details_coupon' => $order_details_coupon
                        );

                        // Theo du lieu vao bang chi tiet don hang
                        $cart_id = $value['cart_id'];
                        $pro_id_update = $value['pro_id'];
                        $cond_delete_cart = "cart.cart_id = '$cart_id'";
                        $result_order_details = $ordermodel->insert_order_details('order_details', $data_order_details);
                        $cond_product = "$pro_id_update = $tbl_product.pro_id";

                        $product = $productmodel->productbyid($tbl_product, $cond_product);

                        // cap nhat lai so luong trong san pham
                        foreach($product as $key => $prd) {
                            $data_product = array (
                                'pro_quantity' => $prd['pro_quantity'] - $value['cart_pro_quantity']
                            );
                            
                            $product_update = $productmodel->updateproduct($tbl_product, $data_product, $cond_product);
                        }

                        // Xoa du lieu trong gio hang
                        $delete_cart = $cartmodel->deletecart($tbl_cart, $cond_delete_cart);
                    }

                    // data cua bang thong ke
                    $data_statiscial = array(
                        'sta_order_id' => $order_code,
                        'sta_quantity' => count($cart),
                        'sta_date' => $date,
                        'sta_statistic' => $sta_statistic
                    );
                    // Them du lieu vao bang statistic
                    // Muon model cua order
                    $result_statistic = $ordermodel->insert_order_details('statistic', $data_statiscial);

                    if($result_order_details == 1) {
                        // Gui mail xac nhan don hang
                        header("Location:".BASE_URL."/order_user/send_mail/".$order_code);
                        exit();
                    } else {
                        $error = "Thêm vào thất bại!";
                        header("Location:".BASE_URL."/cart_user?error=".$error);
                        exit();
                    }
                }else {
                    $message = "Bạn đã đặt hàng thành công. Cảm ơn!, chúc bạn mua sắm vui vẻ";
                    header("Location:".BASE_URL."?msg=".urlencode($message));
                }
            }
        }

        public function list_order() {
            session_start();
            $accountmodel = $this->load->model("accountmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                $message = "Có vẻ bạn chưa đăng kí tài khoản vui lòng thử lại";
                header("Location:".BASE_URL."?msg=".$message);
                exit();
            }

            $tbl_brand = "brand";
            $tbl_post = "category_post";
            $tbl_cart = 'cart';
            
            // Load các model
            $categorymodel = $this->load->model("categorymodel");            
            $cartmodel = $this->load->model("cartmodel");

            // du lieu bang order_details
            $tbl_order_details = "order_details";
            $tbl_cus = "customer";
            $tbl_product = "product";
            $cond_order = "$tbl_order_details.cus_id = $tbl_cus.cus_id
                            AND $tbl_product.pro_id = $tbl_order_details.pro_id
                            AND $tbl_cus.acc_id = $user_id";
            $ordermodel = $this->load->model("ordermodel");

            $data["order"] = $ordermodel->list_order_user($tbl_order_details, $tbl_cus, $tbl_product, $cond_order);
            // end 

            $cond_cart = "cart.acc_id = '$user_id'";

            // Lấy dữ liệu từ các bảng
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);

            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);

            $this->load->view("doctype");
            $this->load->view("order/title_order");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("profile/sidebar_profile", $data);
            $this->load->view("order/order", $data);
            $this->load->view("footer");
        }

        public function list_order_details($id = '') {
            if(!empty($id)) {
                session_start();
                $accountmodel = $this->load->model("accountmodel");

                // lấy id của user đang đăng nhập
                if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                    $user_id = $_SESSION['acc_id'];
                    $data["user"] = $accountmodel->getAccountById($user_id);
                }else {
                    $message = "Có vẻ bạn chưa đăng kí tài khoản vui lòng thử lại";
                    header("Location:".BASE_URL."?msg=".$message);
                    exit();
                }

                $tbl_brand = "brand";
                $tbl_post = "category_post";
                $tbl_cart = 'cart';
                
                // Load các model
                $categorymodel = $this->load->model("categorymodel");            
                $cartmodel = $this->load->model("cartmodel");

                // du lieu bang order_details
                $tbl_order_details = "order_details";
                $tbl_product = "product";
                $cond_order_details = "$tbl_order_details.order_code = '$id' AND
                                        $tbl_order_details.pro_id = $tbl_product.pro_id AND
                                        $tbl_brand.brand_id = $tbl_product.pro_brand_id";
                $ordermodel = $this->load->model("ordermodel");
                $data["order_details"] = $ordermodel->list_order_details_user($tbl_order_details, $tbl_product, $tbl_brand, $cond_order_details);
                // end 

                // dulieu bang order
                $tbl_order = 'm_order';
                $cond_order = "$tbl_order.order_code = $id";
                $data["order"] = $ordermodel->order_user_byid($tbl_order, $cond_order);


                $cond_cart = "cart.acc_id = '$user_id'";

                // Lấy dữ liệu từ các bảng
                $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);

                $data["brand"] = $categorymodel->brand($tbl_brand);
                $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
                

                $this->load->view("doctype");
                $this->load->view("order_details/title_order_details");
                if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                    $this->load->view("header_login", $data);
                }else {
                    $this->load->view("header", $data);
                }
                $this->load->view("profile/sidebar_profile", $data);
                $this->load->view("order_details/order_details", $data);
                $this->load->view("footer");
            }else {
                header('Location: '.BASE_URL);
            }
        }

        public function send_mail($id = '') {
            session_start();
            if(isset($_SESSION["acc_email"])) {
                $email = $_SESSION["acc_email"];
                $mailer = new Mailer();
    
                // Compose the email content
                $title = "Xác nhận mua hàng thành công";

                $href = BASE_URL."/order_user/list_order_details/".$id;
                $content = "
                Chúng tôi đã nhận được đơn đặt hàng của bạn!</br>
                Vui lòng click vào <a href=".$href.">đây</a> để xem chi tiết đơn hàng của bạn";
    
                // Send the email
                $send_mail_success = $mailer->sendMail($title, $content, $email);
                if($send_mail_success) {
                    $message = "Đặt hàng thành công chúc bạn mua sắm vui vẻ!";
                    header("Location:".BASE_URL."?msg=".$message);
                    exit();
                }else {
                    $message = "Đặt hàng không thành công vui lòng thử lại";
                    header("Location:".BASE_URL."?msg=".$message);
                    exit();
                }
            } else {
                $message = "Có vẻ bạn chưa đăng kí tài khoản vui lòng thử lại";
                header("Location:".BASE_URL."?msg=".$message);
                exit();
            }
        }
    }
?>