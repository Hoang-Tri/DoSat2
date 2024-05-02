<?php
    class Account_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->sign_in();
        }

        public function sign_in() {

            $this->load->view("doctype");
            $this->load->view("sign_in/title_sign_in");
            $this->load->view("sign_in/sign_in");   
        }

        public function authentication_sign_in() {
            if ($_SERVER["REQUEST_METHOD"] != "POST") {
                header("Location:".BASE_URL."/account_user");
                exit();
            }
            $email = $_POST["acc_email"];
            $password = md5($_POST["acc_password"]);

            $tbl_account = "account";
            $accountmodel = $this->load->model("accountmodel");

            $count = $accountmodel->login($tbl_account, $email, $password);

            if($count == 1) {
                // KHI DANG KIEM TRA DANG NHAP XONG ROI
                $result = $accountmodel->getlogin($tbl_account, $email, $password);
                Session::init();
                Session::set("account", true); //SET MOT SESSION LOGIN
                Session::set("acc_email", $result[0]["acc_email"]);
                Session::set("acc_name", $result[0]["acc_name"]);
                Session::set("acc_id", $result[0]["acc_id"]);
                header("Location:".BASE_URL);
            }else if($count == 0) {
                $error = "Tài khoản này không tồn tại!";
                header("Location:".BASE_URL."/account_user/sign_in?msg=".$error);
           }
        }

        public function sign_up() {
            $this->load->view("doctype");
            $this->load->view("sign_up/title_sign_up");
            $this->load->view("sign_up/sign_up");   
        }

        public function insert_signup() {
            // Ensure the request method is POST
            if ($_SERVER["REQUEST_METHOD"] != "POST") {
                header("Location:".BASE_URL."/account_user");
                exit();
            }
            $table = "account";
        
            $acc_name = $_POST["acc_name"];
            $acc_email = $_POST["acc_email"];
            $acc_password = md5($_POST["acc_password"]);
        
            $accountmodel = $this->load->model("accountmodel");

            $checkmail = $accountmodel->checkemail($table, $acc_email);
            if($checkmail >= 1) {
                $error = "Tài khoản đã được đăng kí!";
                header("Location:".BASE_URL."/account_user/sign_up?msg=".$error);
                exit();
            }

            // Prepare data for insertion
            $data = array(
                "acc_name" => $acc_name,
                "acc_email" => $acc_email,
                "acc_password" => $acc_password 
            );
        
            // Insert data into the database
            $result = $accountmodel->insert_signup($table, $data);
        
            // Check insertion result and redirect accordingly
            if($result == 1) {
                $message = "Đăng kí tài khoản thành công";
                header("Location:".BASE_URL."/account_user/sign_in?msg=".$message);
                exit();

            } else {
                $error = "Đăng kí tài khoản thất bại!";
                header("Location:".BASE_URL."/account_user/sign_up?error=".$error);
                exit();
            }
        }
        
        public function logout() {
            Session::init();
            Session::destroy();
            header("Location:".BASE_URL);
        }
    }
?>