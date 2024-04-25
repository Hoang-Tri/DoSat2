<?php
    class product extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            $this->add_cate_product();
        }


        // List ra các đơn hàng
        public function add_cate_product() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/product/add_cate_product");
            $this->load->view("admin/footer");
        }

        public function insert_product() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $title = $_POST["cate_pro_title"];
                $desc = $_POST["cate_pro_desc"];
                
                // Kiểm tra tính hợp lệ của dữ liệu đầu vào
                if (empty($title) || empty($desc)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/product?error=".urlencode($error));
                    exit();
                }
        
                // Xử lý dữ liệu trước khi thêm vào cơ sở dữ liệu (ví dụ: thực hiện các kiểm tra hoặc xử lý khác)
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "category_product";
                $data = array(
                    "cate_pro_title" => $title,
                    "cate_pro_desc" => $desc
                );
                $categorymodel = $this->load->model("categorymodel");
                $result = $categorymodel->insertcategory($table, $data);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Thêm vào thành công";
                    header("Location:".BASE_URL."/product?msg=".$message);
                    exit();
                } else {
                    $error = "Failed to add product!";
                    header("Location:".BASE_URL."/product?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/product");
                exit();
            }
        }        
    }
?>