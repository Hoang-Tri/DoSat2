<?php
    class brand extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            $this->add_brand();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function add_brand() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/brand/add_brand");
            $this->load->view("admin/footer");
        }

        // Thên thương hiệu tại đây với database
        public function insert_brand() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $brand_name = $_POST["brand_name"];
                $desc = $_POST["brand_desc"];
                
                // Kiểm tra tính hợp lệ của dữ liệu đầu vào
                if (empty($brand_name) || empty($desc)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/brand?error=".urlencode($error));
                    exit();
                }
        
                // Xử lý dữ liệu trước khi thêm vào cơ sở dữ liệu (ví dụ: thực hiện các kiểm tra hoặc xử lý khác)
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "brand";
                $data = array(
                    "brand_name" => $brand_name,
                    "brand_desc" => $desc
                );
                $categorymodel = $this->load->model("categorymodel");
                $result = $categorymodel->insertcategory($table, $data);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Thêm vào thành công";
                    header("Location:".BASE_URL."/brand?msg=".$message);
                    exit();
                } else {
                    $error = "Thêm sản phẩm thất bại!";
                    header("Location:".BASE_URL."/brand?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/brand");
                exit();
            }
        } 
        
        // Liệt kê thương hiệu 
        public function list_brand() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $table = "brand";
            $table_id = "brand.brand_id";
            $categorymodel = $this->load->model("categorymodel");

            $data["brand"] = $categorymodel->category($table, $table_id);

            $this->load->view("admin/brand/list_brand", $data);
            $this->load->view("admin/footer");
        }

        // Xoá thương hiệu

        public function delete_brand($id) {
            $categorymodel = $this->load->model("categorymodel");
            $table = "brand";
            $cond = "brand.brand_id = '$id'";
            $result = $categorymodel->deletecategory($table, $cond);

            if($result == 1) {
                header("Location:".BASE_URL."/brand/list_brand");
                exit();
            } else {
                header("Location:".BASE_URL."/brand/list_brand");
                exit();
            }
        }

        // view edit
        public function edit_brand($id) {
            $table = "brand";
            $cond = "brand.brand_id = '$id'";
            $categorymodel = $this->load->model("categorymodel");
            $data['brandbyid'] = $categorymodel->categorybyid($table, $cond);
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/brand/edit_brand", $data);
            $this->load->view("admin/footer");
        }

        // Hàm cập nhật brand
        public function update_brand($id) {
            $categorymodel = $this->load->model("categorymodel");
            $table = "brand";
            $cond = "brand.brand_id = '$id'";

            $brand_name = $_POST["brand_name"];
            $desc = $_POST["brand_desc"];
            // Kiểm tra tính hợp lệ của dữ liệu đầu vào
            if (empty($brand_name) || empty($desc)) {
                $error = "Please fill in all fields.";
                header("Location:".BASE_URL."/brand?error=".urlencode($error));
                exit();
            }
            $data = array(
                "brand_name" => $brand_name,
                "brand_desc" => $desc
            );
            
            $result = $categorymodel->updatecategory($table, $data, $cond);

            if($result == 1) {
                $message = "Cập nhật thương hiệu thành công";
                header("Location:".BASE_URL."/brand/list_brand?msg=".$message);
                exit();
            } else {
                $error = "Cập nhật thương hiệu thất bại";
                header("Location:".BASE_URL."/brand/list_brand?error=".$error);
                exit();
            }
        }
    }
?>