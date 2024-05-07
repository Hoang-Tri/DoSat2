<?php
    class product extends DController{
        // produc kế thừa DController
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->add_product();
            
        }
        //product
        public function add_product(){
            
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            // $table = "product";
            // $productmodel = $this->load->model('productmodel');

            $table = "brand";
            $table_brand_id = "brand.brand_id";
            $productmodel = $this->load->model("productmodel");

            $data["brand"] = $productmodel->product($table, $table_brand_id);

            $this->load->view("admin/product/add_product",$data);
            $this->load->view("admin/footer");
        }
        public function insert_product() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $title = $_POST['pro_title'];
                $desc = $_POST['pro_desc'];
                $price = $_POST['pro_price'];
                $quantity = $_POST['pro_quantity'];
                $brand = $_POST['pro_brand_id'];
                
                // File upload handling
                $image = $_FILES['pro_image']['name'];
                $tmp_image = $_FILES['pro_image']['tmp_name'];
                $upload_path = "assets/uploads/product/" . $image; // Destination path
        
                // Validate required fields
                if (empty($title) || empty($desc) || empty($price) || empty($quantity) || empty($image)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/product?error=".urlencode($error));
                    exit();
                }
        
                // Move uploaded file to destination directory
                if (!move_uploaded_file($tmp_image, $upload_path)) {
                    $error = "Failed to upload image.";
                    header("Location:".BASE_URL."/product?error=".urlencode($error));
                    exit();
                }
        
                // Prepare data for insertion
                $table = "product";
                $data = array(
                    'pro_title' => $title,
                    'pro_desc' => $desc,
                    'pro_price' => $price,
                    'pro_quantity' => $quantity,
                    'pro_image' => $image,
                    'pro_brand_id' => $brand

                );
        
                // Insert product into database
                $productmodel = $this->load->model("productmodel");
                $result = $productmodel->insertproduct($table, $data);
        
                // Redirect based on insertion result
                if ($result == 1) {
                    $message = "Thêm vào thành công";
                    header("Location:".BASE_URL."/product?msg=".$message);
                    exit();
                } else {
                    $error = "Thêm sản phẩm thất bại!";
                    header("Location:".BASE_URL."/product?error=".$error);
                    exit();
                }
            } else {
                // Redirect if not a POST request
                header("Location:".BASE_URL."/product");
                exit();
            }
        }
        

        public function list_product() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $table = "product";
            $table_brand = "brand";
            $productmodel = $this->load->model("productmodel");

            $data["product"] = $productmodel->listproduct($table, $table_brand);

            $this->load->view("admin/product/list_product", $data);
            $this->load->view("admin/footer");
        }

        // public function delete_product($id) { 
        //     $productmodel = $this->load->model("productmodel");
        //     $table = "product";
        //     $cond = "product.pro_id = '$id'";
        //     $result = $productmodel-> deleteproduct($table,$cond);

        //     if($result == 1) {
        //         header("Location:".BASE_URL."/product/list_product");
        //         exit();
        //     } else {
        //         header("Location:".BASE_URL."/product/list_product");
        //         exit();
        //     }
        // }
        //
        public function delete_product($id) {
            $productmodel = $this->load->model("productmodel");
            $table = "product";
            $cond = "product.pro_id = '$id'";
            $product_data = $productmodel->productbyid($table, $cond);
        
            $result = $productmodel->deleteproduct($table, $cond);
            
            if($result == 1) {
                foreach($product_data as $key => $value) {
                    $path_unlink = "assets/uploads/product/";
                    unlink($path_unlink.$value['pro_image']);
                }
                header("Location:".BASE_URL."/product/list_product");
                exit();
            } else {
                header("Location:".BASE_URL."/product/list_product");
                exit();
            }
        }

        public function edit_product($id) {
            $table = "product";
            $table_brand = "brand";
            $cond = "product.pro_id = '$id'";
            $table_id = "brand_id";

            $productmodel = $this->load->model("productmodel");
            $data['brand'] = $productmodel->brand($table_brand, $table_id);
            $data['productbyid'] = $productmodel->productbyid($table, $cond);

            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/product/edit_product", $data);
            $this->load->view("admin/footer");
        }
        
        public function update_product($id) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $table = "product";
                $cond = "product.pro_id ='$id'";
                $productmodel = $this->load->model('productmodel');

                $title = $_POST['pro_title'];
                $desc = $_POST['pro_desc'];
                $price = $_POST['pro_price'];
                $quantity = $_POST['pro_quantity'];
                $brand = $_POST['pro_brand_id'];
                
                $image = $_FILES['pro_image']['name'];
                $tmp_image = $_FILES['pro_image']['tmp_name'];
                $div = explode('.',$image);
                $file_ext = strtolower(end($div));
                $unique_image = $div[0].time().'.'.$file_ext;
            
                $path_uploads = "assets/uploads/product/".$unique_image;


                if (empty($title) || empty($desc) || empty($price) || empty($quantity)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/product/add_product?error=".urlencode($error));
                    exit();
                }

                if($image){
                    // If a new image is uploaded
                    $data['productbyid'] =  $productmodel->productbyid($table,$cond);
                    foreach ($data['productbyid'] as $key => $value){
                        $path_unlink = "assets/uploads/product/";
                        unlink($path_unlink.$value['pro_image']);
                    }
                    $data = array (
                        'pro_title' => $title,
                        'pro_desc' => $desc,
                        'pro_price' => $price,
                        'pro_quantity' => $quantity,
                        'pro_image' => $unique_image,
                        'pro_brand_id' => $brand
                    );
                    move_uploaded_file($tmp_image, $path_uploads);
                }
                else{
                    // $data['productbyid'] =  $productmodel->productbyid($table,$cond);
                    // foreach ($data['productbyid'] as $key => $value){
                    //     unset($data['pro_image']);
                    // }
                    $data = array (
                        'pro_title' => $title,
                        'pro_desc' => $desc,
                        'pro_price' => $price,
                        'pro_quantity' => $quantity,
                        'pro_brand_id' => $brand

                    );
                } 
            } else {
                
                header("Location:".BASE_URL."/product");
                exit();
            }
            $result =  $productmodel->updateproduct($table,$data,$cond);
            if($result == 1) {
                $message = "Cập nhật vào thành công";
                header("Location:".BASE_URL."/product/list_product?msg=".$message);
                exit();
            } else {
                $error = "Cập nhật vào thất bại!";
                header("Location:".BASE_URL."/product/list_product?error=".$error);
                exit();
            }
        }
    }
?>