<?php
    class Profile_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->profile();
        }
        public function profile() {
            session_start();
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            
            $categorymodel = $this->load->model("categorymodel");     
            
            $accountmodel = $this->load->model("accountmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id'])) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                header("Location:".BASE_URL);
            }
            
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);

            $this->load->view("doctype");
            $this->load->view("profile/title_profile");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("profile/profile", $data);
            $this->load->view("footer");
        }

        public function edit_profile() {
            session_start();
            $tbl_brand = "brand";
            $tbl_post = "category_post";
            
            $categorymodel = $this->load->model("categorymodel");     
            
            $accountmodel = $this->load->model("accountmodel");

            // lấy id của user đang đăng nhập
            if(isset($_SESSION['acc_id'])) {
                $user_id = $_SESSION['acc_id'];
                $data["user"] = $accountmodel->getAccountById($user_id);
            }else {
                header("Location:".BASE_URL);
            }
            
            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_post);

            $this->load->view("doctype");
            $this->load->view("profile/title_profile");
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("profile/edit_profile", $data);
            $this->load->view("footer");
        }

        public function update_profile($id = "") {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu
                $acc_name = $_POST["acc_name"];
                $acc_email = $_POST["acc_email"];
                $acc_phone = $_POST["acc_phone"];
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "account";
                $cond = "account.acc_id = '$id'";
                $accountmodel = $this->load->model("accountmodel");

                // if($post_img) {
                //     $data['postbyid'] = $accountmodel->postbyid($table, $cond);

                //     foreach($data['postbyid'] as $key => $value) {
                //         $path_unlink = "assets/uploads/post/";
                //         unlink($path_unlink.$value['post_img']);
                //     }

                    $data = array(
                        "acc_name" => $acc_name,
                        "acc_email" => $acc_email,
                        "acc_phone" => $acc_phone,
                    );
                //     move_uploaded_file($tmp_img, $path_uploads);
                // }else {
                //     $data = array(
                //         "post_title" => $post_title,
                //         "post_content" => $post_content,
                //         // "post_img" => $unique_img,
                //         "cate_post_id" => $cate_post
                //     );
                // }
                $result = $accountmodel->updateprofile($table, $data, $cond);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Cập nhật vào thành công";
                    header("Location:".BASE_URL."/profile_user/edit_profile?msg=".$message);
                    exit();
                } else {
                    $error = "Cập nhật vào thất bại!";
                    header("Location:".BASE_URL."/profile_user/edit_profile?error=".$error);
                    exit();
                }
            } else {
                // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang sản phẩm
                header("Location:".BASE_URL."/post");
                exit();
            }
        }
    }
?>