<?php
    class Order extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

       
        public function index() {
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->list_order();
        }


        // Thêm thương  hiệu tại đây view (giao diện)
        public function list_order() {
            $table = "m_order";
            $table_id = "m_order.order_id";
            $ordermodel = $this->load->model("ordermodel");

            $data["order"] = $ordermodel->list_order($table, $table_id);

            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/order/list_order", $data);
            $this->load->view("admin/footer");
        }

        public function list_order_details($id = '') {
            if(empty($id)) {
                header("Location: ".BASE_URL.'/admin_login');
            }else {
                // lay ra bang order_details
                $tbl_order_details = "order_details";
                $tbl_product = "product";
                $tbl_cus = "customer";
                $cond = "$tbl_order_details.order_code = '$id' AND
                        $tbl_cus.cus_id = $tbl_order_details.cus_id AND
                        $tbl_product.pro_id = $tbl_order_details.pro_id";
                $ordermodel = $this->load->model("ordermodel");

                $data["order_details"] = $ordermodel->list_order_details($tbl_order_details, $tbl_product, $tbl_cus, $cond);

                $this->load->view("admin/header");
                $this->load->view("admin/sidebar");
                $this->load->view("admin/order/list_order_details", $data);
                $this->load->view("admin/footer");
            }

        }
        public function update_order_status($id) {
            $ordermodel = $this->load->model("ordermodel");
            $table = "m_order";
            $cond = "m_order.order_code = '$id'";

            $order_status = $_POST["order_status"];

            $data = array(
                "order_status" => $order_status
            );
            
            $result = $ordermodel->update_order_status($table, $data, $cond);

            if($result == 1) {
                $message = "Đã bàn giao cho đơn vị vận chuyển";
                header("Location:".BASE_URL."/order/list_order?msg=".$message);
                exit();
            } else {
                $error = "Có lỗi trong quá trình xữ lí vui lòng thử lại!";
                header("Location:".BASE_URL."/order/list_order?error=".$error);
                exit();
            }
        }
    }
?>