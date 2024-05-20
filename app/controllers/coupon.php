<?php
    class coupon extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->add_coupon();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function add_coupon() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/coupon/add_coupon");
            $this->load->view("admin/footer");
        }

        // Thên thương hiệu tại đây với database
        public function insert_coupon() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $coupon_code = $_POST["coupon_code"];
                $coupon_form = $_POST["coupon_form"];
                $coupon_times = $_POST["coupon_times"];
                $coupon_sale = $_POST["coupon_sale"];
                $coupon_desc = $_POST["coupon_desc"];
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "coupon";
                $data = array(
                    "coupon_code" => $coupon_code,
                    "coupon_form" => $coupon_form,
                    "coupon_times" => $coupon_times,
                    "coupon_sale" => $coupon_sale,
                    "coupon_desc" => $coupon_desc
                );

                
                $couponmodel = $this->load->model("couponmodel");
                $cond_coupon = "$table.coupon_code = '$coupon_code'";

                // Kiem tra xem co trong du lieu chua 
                $coupon = $couponmodel->couponbycode($table, $cond_coupon);
                if(empty($coupon)) {
                    $result = $couponmodel->insertcoupon($table, $data);
                    if($result) {
                        $message = "Thêm mã thành công";
                        header("Location:".BASE_URL."/coupon?msg=".$message);
                        exit();
                    }
                } else {
                    $error = "Mã giảm giá đã tồn tại";
                    header("Location:".BASE_URL."/coupon?error=".$error);
                    exit();
                }
            } else {
                header("Location:".BASE_URL."/coupon");
                exit();
            }
        } 
        
        // // Liệt kê thương hiệu 
        public function list_coupon() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $couponmodel = $this->load->model("couponmodel");
            $tbl_coupon = 'coupon';

            $data['coupon'] = $couponmodel->coupon($tbl_coupon);
            
            $this->load->view("admin/coupon/list_coupon", $data);
            $this->load->view("admin/footer");
        }

        // // Xoá thương hiệu

        // public function delete_coupon($id) {
        //     $categorymodel = $this->load->model("categorymodel");
        //     $table = "coupon";
        //     $cond = "coupon.coupon_id = '$id'";
        //     $result = $categorymodel->deletecategory($table, $cond);

        //     if($result == 1) {
        //         header("Location:".BASE_URL."/coupon/list_coupon");
        //         exit();
        //     } else {
        //         header("Location:".BASE_URL."/coupon/list_coupon");
        //         exit();
        //     }
        // }

        // // view edit
        public function edit_coupon($id) {
            $table = "couponship";
            $tbl_tinhthanhpho = "tbl_tinhthanhpho";
            $cond = "$table.coupon_id = '$id' AND $table.coupon_matp = $tbl_tinhthanhpho.matp";

            $categorymodel = $this->load->model("categorymodel");

            $data['coupon'] = $categorymodel->coupon_province($table, $tbl_tinhthanhpho, $cond);
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/coupon/edit_coupon", $data);
            $this->load->view("admin/footer");
        }

        // // Hàm cập nhật coupon
        public function update_coupon() {
            $city = $_POST["city"];
            $coupon = $_POST["coupon_coupon"];
            $coupon_id = $_POST["coupon_id"];

            $categorymodel = $this->load->model("categorymodel");
            $table = "couponship";
            
            $cond = "$table.coupon_id = '$coupon_id'";

            $data = array(
                "coupon_matp" => $city,
                "coupon_coupon" => $coupon
            );
            
            $update = $categorymodel->updatecategory($table, $data, $cond);
        }

        public function set_coupon() {
            session_start();

            $cus_id = $_POST["cus_id"];

            $cusmodel = $this->load->model("cusmodel");
            $table = "customer";
            $cond = "$table.cus_id = $cus_id";

            $cus =  $cusmodel->cusbyid($table, $cond);

            $_SESSION['coupon'] = $cus[0]['coupon_coupon'];
            echo json_encode(['status' => 'success', 'coupon' => $_SESSION['coupon']]);
        }
    }
?>