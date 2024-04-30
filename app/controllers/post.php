<?php
    class Post extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

        public function index() {
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->add_cate_post();
        }

        // CATEGORY POST
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


        // POST
        public function add_post() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $table_cate_post = "category_post";
            $table_cate_post_id = "category_post.cate_post_id";
            $postmodel = $this->load->model("postmodel");

            $data["cate_post"] = $postmodel->post($table_cate_post, $table_cate_post_id);
            $this->load->view("admin/post/add_post", $data);
            $this->load->view("admin/footer");
        }

        // Thêm bài viết
        public function insert_post() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $post_title = $_POST["post_title"];
                $post_content = $_POST["post_content"];

                $post_img = $_FILES["post_img"]['name'];
                $tmp_img = $_FILES["post_img"]['tmp_name'];
                $div = explode(".", $post_img);
                $file_ext = strtolower(end($div));
                $unique_img = $div[0].time().".".$file_ext;

                $path_uploads = "assets/uploads/post/".$unique_img;

                $cate_post = $_POST["cate_post"];
                
                // Kiểm tra tính hợp lệ của dữ liệu đầu vào
                if (empty($post_title) || empty($post_content)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/post/add_post?error=".urlencode($error));
                    exit();
                }
        
                // Xử lý dữ liệu trước khi thêm vào cơ sở dữ liệu (ví dụ: thực hiện các kiểm tra hoặc xử lý khác)
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "post";
                $data = array(
                    "post_title" => $post_title,
                    "post_content" => $post_content,
                    "post_img" => $unique_img,
                    "cate_post_id" => $cate_post
                );
                $postmodel = $this->load->model("postmodel");
                $result = $postmodel->insertpost($table, $data);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    move_uploaded_file($tmp_img, $path_uploads);
                    $message = "Thêm vào thành công";
                    header("Location:".BASE_URL."/post/add_post?msg=".$message);
                    exit();
                } else {
                    $error = "Thêm vào thất bại!";
                    header("Location:".BASE_URL."/post/add_post?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/post");
                exit();
            }
        }

        public function list_post() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $table_post = "post";
            $table_cate_post = "category_post";
            $postmodel = $this->load->model("postmodel");

            $data["post"] = $postmodel->listpost($table_post, $table_cate_post);

            $this->load->view("admin/post/list_post", $data);
            $this->load->view("admin/footer");
        }

        public function edit_post($id) {
            $table_post = "post";
            $table_cate_post = "category_post";
            $cate_post_id = "cate_post_id";

            $cond = "post.post_id = '$id'";

            $postmodel = $this->load->model("postmodel");
            $categorymodel = $this->load->model("categorymodel");
            $data['cate_post'] = $categorymodel->cate_post($table_cate_post, $cate_post_id);
            $data['postbyid'] = $postmodel->postbyid($table_post, $cond);
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/post/edit_post", $data);
            $this->load->view("admin/footer");
        }

        public function update_post($id) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $post_title = $_POST["post_title"];
                $post_content = $_POST["post_content"];

                $post_img = $_FILES["post_img"]['name'];
                $tmp_img = $_FILES["post_img"]['tmp_name'];
                $div = explode(".", $post_img);
                $file_ext = strtolower(end($div));
                $unique_img = $div[0].time().".".$file_ext;

                $path_uploads = "assets/uploads/post/".$unique_img;

                $cate_post = $_POST["cate_post"];
                
                // Kiểm tra tính hợp lệ của dữ liệu đầu vào
                if (empty($post_title) || empty($post_content)) {
                    $error = "Please fill in all fields.";
                    header("Location:".BASE_URL."/post/add_post?error=".urlencode($error));
                    exit();
                }
        
                // Xử lý dữ liệu trước khi thêm vào cơ sở dữ liệu (ví dụ: thực hiện các kiểm tra hoặc xử lý khác)
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "post";
                $cond = "post.post_id = '$id'";
                $postmodel = $this->load->model("postmodel");

                if($post_img) {
                    $data['postbyid'] = $postmodel->postbyid($table, $cond);

                    foreach($data['postbyid'] as $key => $value) {
                        $path_unlink = "assets/uploads/post/";
                        unlink($path_unlink.$value['post_img']);
                    }

                    $data = array(
                        "post_title" => $post_title,
                        "post_content" => $post_content,
                        "post_img" => $unique_img,
                        "cate_post_id" => $cate_post
                    );
                    move_uploaded_file($tmp_img, $path_uploads);
                }else {
                    $data = array(
                        "post_title" => $post_title,
                        "post_content" => $post_content,
                        // "post_img" => $unique_img,
                        "cate_post_id" => $cate_post
                    );
                }
                $result = $postmodel->updatepost($table, $data, $cond);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Cập nhật vào thành công";
                    header("Location:".BASE_URL."/post/list_post?msg=".$message);
                    exit();
                } else {
                    $error = "Cập nhật vào thất bại!";
                    header("Location:".BASE_URL."/post/list_post?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/post");
                exit();
            }
        }

        public function delete_post($id) {
            $postmodel = $this->load->model("postmodel");
            $table = "post";
            $cond = "post.post_id = '$id'";
            $post_data = $postmodel->postbyid($table, $cond); // Lấy dữ liệu bài viết trước khi xóa
        
            $result = $postmodel->deletepost($table, $cond);
            
            if($result == 1) {
                foreach($post_data as $key => $value) {
                    $path_unlink = "assets/uploads/post/";
                    unlink($path_unlink.$value['post_img']);
                }
                header("Location:".BASE_URL."/post/list_post");
                exit();
            } else {
                header("Location:".BASE_URL."/post/list_post");
                exit();
            }
        }
        
    }
?>