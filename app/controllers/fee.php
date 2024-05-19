<?php
    class fee extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->add_fee();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function add_fee() {
            $addressmodel = $this->load->model("addressmodel");
            $data['province'] = $addressmodel->getaddress('tbl_tinhthanhpho');

            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/fee/add_fee", $data);
            $this->load->view("admin/footer");
        }

        // Thên thương hiệu tại đây với database
        public function insert_fee() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $city = $_POST["city"];
                $fee = $_POST["fee_fee"];
        
                // Thêm dữ liệu vào cơ sở dữ liệu
                $table = "feeship";
                $data = array(
                    "fee_matp" => $city,
                    "fee_fee" => $fee
                );

                $categorymodel = $this->load->model("categorymodel");
                $cond_fee = "$table.fee_matp = $city";
                // Kiem tra xem co trong du lieu chua 
                $province = $categorymodel->categorybyid($table, $cond_fee);
                if (!empty($province)) {
                    foreach ($province as $key => $value) {
                        $cond_update = "$table.fee_id = " . $value['fee_id'];
                        $update = $categorymodel->updatecategory($table, $data, $cond_update);
                    }
                } else {
                    $result = $categorymodel->insertcategory($table, $data);
                }


            } else {
                header("Location:".BASE_URL."/fee");
                exit();
            }
        } 
        
        // // Liệt kê thương hiệu 
        public function list_fee() {
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $tbl_fee = "feeship";
            $tbl_tinhthanhpho = "tbl_tinhthanhpho";
            $cond_fee = "$tbl_fee.fee_matp = $tbl_tinhthanhpho.matp";
            $categorymodel = $this->load->model("categorymodel");

            // lay du lieu cua fee va tinh thanh pho
            $data["fee"] = $categorymodel->fee_province($tbl_fee, $tbl_tinhthanhpho, $cond_fee);

            $this->load->view("admin/fee/list_fee", $data);
            $this->load->view("admin/footer");
        }

        // // Xoá thương hiệu

        // public function delete_fee($id) {
        //     $categorymodel = $this->load->model("categorymodel");
        //     $table = "fee";
        //     $cond = "fee.fee_id = '$id'";
        //     $result = $categorymodel->deletecategory($table, $cond);

        //     if($result == 1) {
        //         header("Location:".BASE_URL."/fee/list_fee");
        //         exit();
        //     } else {
        //         header("Location:".BASE_URL."/fee/list_fee");
        //         exit();
        //     }
        // }

        // // view edit
        public function edit_fee($id) {
            $table = "feeship";
            $tbl_tinhthanhpho = "tbl_tinhthanhpho";
            $cond = "$table.fee_id = '$id' AND $table.fee_matp = $tbl_tinhthanhpho.matp";

            $categorymodel = $this->load->model("categorymodel");

            $data['fee'] = $categorymodel->fee_province($table, $tbl_tinhthanhpho, $cond);
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/fee/edit_fee", $data);
            $this->load->view("admin/footer");
        }

        // // Hàm cập nhật fee
        public function update_fee() {
            $city = $_POST["city"];
            $fee = $_POST["fee_fee"];
            $fee_id = $_POST["fee_id"];

            $categorymodel = $this->load->model("categorymodel");
            $table = "feeship";
            
            $cond = "$table.fee_id = '$fee_id'";

            $data = array(
                "fee_matp" => $city,
                "fee_fee" => $fee
            );
            
            $update = $categorymodel->updatecategory($table, $data, $cond);
        }

        public function set_fee() {
            session_start();

            $cus_id = $_POST["cus_id"];

            $cusmodel = $this->load->model("cusmodel");
            $table = "customer";
            $cond = "$table.cus_id = $cus_id";

            $cus =  $cusmodel->cusbyid($table, $cond);

            $_SESSION['fee'] = $cus[0]['fee_fee'];
            echo json_encode(['status' => 'success', 'fee' => $_SESSION['fee']]);
        }
    }
?>