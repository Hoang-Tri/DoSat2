<?php
    class Customer_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->customer_insert();
        }

        public function customer_insert() {
            // session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ biểu mẫu

                $cus_name = $_POST["cus_name"];
                $cus_phone = $_POST["cus_phone"];
                $cus_desc = $_POST["cus_desc"];
                $cus_province = $_POST["cus_province"];
                $cus_district = $_POST["cus_district"];
                $cus_wards = $_POST["cus_wards"];     
                $acc_id = $_POST["acc_id"];     
                

                $table = "customer";

                $cusmodel = $this->load->model("cusmodel");
                $addressmodel = $this->load->model("addressmodel");
                $categorymodel = $this->load->model("categorymodel");

                $province = $addressmodel->province('tbl_tinhthanhpho', $cus_province);
                $district = $addressmodel->district('tbl_quanhuyen', $cus_district);
                $wards = $addressmodel->wards('tbl_xaphuongthitran', $cus_wards);

                $cond_fee = "feeship.fee_matp = $cus_province";
                $feeshiping = $categorymodel->fee_province('feeship','tbl_xaphuongthitran', $cond_fee);
               
                // lay ra ten tinh quan huyen xa tu csdl 
                $cus_province = $province[0]['name'];
                $cus_district = $district[0]['name'];
                $cus_wards = $wards[0]['name'];

                if(!empty($feeshiping)) {
                    $fee_fee = $feeshiping[0]['fee_fee'];
                }else {
                    $fee_fee = 50000;
                }

                $data = array(
                    "cus_name" => $cus_name,
                    "cus_phone" => $cus_phone,
                    "cus_desc" => $cus_desc,
                    "cus_province" => $cus_province,
                    "cus_district" => $cus_district,
                    "cus_wards" => $cus_wards,
                    "acc_id" => $acc_id,
                    "fee_fee" => $fee_fee
                );

                $result  = $cusmodel->insertcus($table, $data);
                
                // Kiểm tra kết quả và chuyển hướng người dùng đến trang sản phẩm với thông báo tương ứng
                if($result == 1) {
                    $message = "Thêm địa chỉ thành công";
                    header("Location:".BASE_URL."/shipping_user?msg=".$message);
                    exit();
                } else {
                    $error = "Thêm địa chỉ thất bại!";
                    header("Location:".BASE_URL."/shipping_user?error=".$error);
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