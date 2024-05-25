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
            $tbl_cart = 'cart';

            $productmodel = $this->load->model("productmodel");
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
            session_start();
            
            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_product = "product";
            $tbl_cart = 'cart';
            
            $cond = "$tbl_product.pro_brand_id = $tbl_brand.brand_id
            AND $tbl_product.pro_id = '$id'";

            $productmodel = $this->load->model("productmodel");
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
            
            $checkid = $productmodel->getId($tbl_product, $id);
            if($checkid == 1) {
                
                $data["brand"] = $categorymodel->brand($tbl_brand);
                $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
                $data["product_details"] = $productmodel->product_details($tbl_product, $tbl_brand, $cond);
    
                // print_r($data['product_details']);
                foreach( $data["product_details"] as $key => $brand) {
                    $brand_id = $brand["brand_id"];
                }
                $cond_related = "$tbl_product.pro_brand_id = $tbl_brand.brand_id 
                AND $tbl_brand.brand_id = '$brand_id' AND $tbl_product.pro_id NOT IN('$id')";
                $data["related"] = $productmodel->related_product_home($tbl_product, $tbl_brand, $cond_related);
                
    
                $this->load->view("doctype");
                $this->load->view("product_details/title_product_details");
                
                if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                    $this->load->view("header_login", $data);
                }else {
                    $this->load->view("header", $data);
                }
                $this->load->view("product_details/product_details", $data);   
                $this->load->view("footer");
            }else {
                header('Location:'.BASE_URL);
            }

        }

        // Search product
        public function product_search() {
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

            //search
            

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                $user_id = -1;
            }

            // kiem tra xem co tu can tim kiem hay khong
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
            }else {
                header('Location:'.BASE_URL);
            }
            $cond_cart = "cart.acc_id = '$user_id'";

            
            // Lấy dữ liệu từ các bảng
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);

            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $data["productall"] = $productmodel->productall_home($tbl_product, $tbl_brand);
            $data["productnew"] = $productmodel->productall_new($tbl_product,$tbl_brand);

            $data["productsearch"] = $productmodel->productsearch($tbl_product, $search, $tbl_brand);
            
            

            $this->load->view("doctype");
            $this->load->view("home/title_home");
            
            // Kiểm tra session để hiển thị header phù hợp
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            } else {
                $this->load->view("header", $data);
            }
            
            $this->load->view("search/search", $data);
            $this->load->view("footer");
        }
        // Filter product
        public function filter_product() {
            // Start session
            session_start();
            
            // Initialize table names
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            $tbl_product = "product";
            $tbl_cart = 'cart';
            
            // Load models
            $categorymodel = $this->load->model("categorymodel");            
            $productmodel = $this->load->model("productmodel");
            $accountmodel = $this->load->model("accountmodel");
            $cartmodel = $this->load->model("cartmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id']) && $_SESSION['account'] == true) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }
            else {
                //header('Location:'.BASE_URL);
            }

            // Initialize user id
            $user_id = isset($_SESSION['acc_id']) && $_SESSION['account'] ? $_SESSION['acc_id'] : -1;
            
            // Calculate min and max prices
            $min_price = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
            $max_price = isset($_POST['max_price']) ? $_POST['max_price'] : 0;
            $selected_sizes = isset($_POST['size']) ? $_POST['size'] : 0;
            
            // Fetch data from models
            $cond_cart = "cart.acc_id = '$user_id'";
            $data["cart"] = $cartmodel->cart($tbl_cart, $cond_cart);
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);
            $data["productall"] = $productmodel->productall_home($tbl_product, $tbl_brand);
            $data["productnew"] = $productmodel->productall_new($tbl_product, $tbl_brand);

            //Create condition for product filter
            $cond_product = "$tbl_product.pro_brand_id = $tbl_brand.brand_id 
                AND $tbl_product.pro_price BETWEEN $min_price AND $max_price
                AND $tbl_product.pro_size LIKE '%" . $selected_sizes . "%'";

            // Fetch filtered products
            $data["productfilter"] = $productmodel->productfilter($tbl_product, $tbl_brand, $cond_product);
            
            //Load views
            $this->load->view("doctype");
            $this->load->view("home/title_home");
            
            // Load appropriate header based on session
            $header_view = isset($_SESSION['account']) && $_SESSION['account'] ? "header_login" : "header";
            $this->load->view($header_view, $data);
            
            // Load search and footer views
            $this->load->view("productfilter/productfilter", $data);
            $this->load->view("footer");
        }

    }
?>