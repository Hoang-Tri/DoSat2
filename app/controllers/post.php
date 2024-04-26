<?php
    class Post extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

        public function index() {
            $this->add_cate_post();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function add_cate_post() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/post/add_cate_post");
            $this->load->view("admin/footer");
        }

        // Thên thương hiệu tại đây với database
        public function insert_cate_post() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $cate_post_name = $_POST["cate_post_name"];
                $desc = $_POST["cate_post_desc"];
                
                // Kiểm tra tính hợp lệ của dữ liệu đầu vào
                if (empty($cate_post_name) || empty($desc)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/cate_post?error=".urlencode($error));
                    exit();
                }
        
                // Xử lý dữ liệu trước khi thêm vào cơ sở dữ liệu (ví dụ: thực hiện các kiểm tra hoặc xử lý khác)
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "category_post";
                $data = array(
                    "cate_post_name" => $cate_post_name,
                    "cate_post_desc" => $desc
                );
                $categorymodel = $this->load->model("categorymodel");
                $result = $categorymodel->insertcategory_post($table, $data);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Thêm vào thành công";
                    header("Location:".BASE_URL."/post?msg=".$message);
                    exit();
                } else {
                    $error = "Thêm sản phẩm thất bại!";
                    header("Location:".BASE_URL."/post?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/post");
                exit();
            }
        } 
        
        // Liệt kê thương hiệu 
        public function list_cate_post() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $table = "category_post";
            $table_id = "category_post.cate_post_id";
            $categorymodel = $this->load->model("categorymodel");

            $data["cate_post"] = $categorymodel->cate_post($table, $table_id);

            $this->load->view("admin/post/list_cate_post", $data);
            $this->load->view("admin/footer");
        }

        // Xoá thương hiệu

        public function delete_cate_post($id) {
            $categorymodel = $this->load->model("categorymodel");
            $table = "category_post";
            $cond = "category_post.cate_post_id = '$id'";
            $result = $categorymodel->delete_cate_post($table, $cond);

            if($result == 1) {
                header("Location:".BASE_URL."/post/list_cate_post");
                exit();
            } else {
                header("Location:".BASE_URL."/post/list_cate_post");
                exit();
            }
        }

        // view edit
        public function edit_cate_post($id) {
            $table = "category_post";
            $cond = "category_post.cate_post_id = '$id'";
            $categorymodel = $this->load->model("categorymodel");
            $data['catepostbyid'] = $categorymodel->categorybyid($table, $cond);
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/post/edit_cate_post", $data);
            $this->load->view("admin/footer");
        }

        // Hàm cập nhật cate_post
        public function update_cate_post($id) {
            $categorymodel = $this->load->model("categorymodel");
            $table = "category_post";
            $cond = "category_post.cate_post_id = '$id'";

            $cate_post_name = $_POST["cate_post_name"];
            $desc = $_POST["cate_post_desc"];
            // Kiểm tra tính hợp lệ của dữ liệu đầu vào
            if (empty($cate_post_name) || empty($desc)) {
                $error = "Please fill in all fields.";
                header("Location:".BASE_URL."/post?error=".urlencode($error));
                exit();
            }
            $data = array(
                "cate_post_name" => $cate_post_name,
                "cate_post_desc" => $desc
            );
            
            $result = $categorymodel->update_cate_post($table, $data, $cond);

            if($result == 1) {
                $message = "Cập nhật danh mục bài viết thành công";
                header("Location:".BASE_URL."/post/list_cate_post?msg=".$message);
                exit();
            } else {
                $error = "Cập nhật danh mục bài viết thất bại";
                header("Location:".BASE_URL."/post/list_cate_post?error=".$error);
                exit();
            }
        }
    }
?>