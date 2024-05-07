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

        // forgot password
        public function forgot_password() {
            $this->load->view("doctype");
            $this->load->view("forgot_password/title_forgot_password");
            $this->load->view("forgot_password/forgot_password");   
        }

        public function reset_password() {

            if(isset($_GET["secret"])) {
                $email = base64_decode($_GET["secret"]);
                $accountmodel = $this->load->model("accountmodel");
                // Check if the email exists in the database
                $checkmail = $accountmodel->checkemail("account", $email);
                if($checkmail == 0) {
                    header("location: ".BASE_URL);
                }else {
                     $data["acc_id"] = $accountmodel->getId($email);
                    $this->load->view("doctype");
                    $this->load->view("reset_password/title_reset_password");
                    $this->load->view("reset_password/reset_password", $data);   
                }
            }else {
                header("location: ".BASE_URL);
            }
        }

        public function send_mail() {
            // Check if the 'acc_email' parameter is set in the POST request
            if(isset($_POST["acc_email"])) {
                $email = $_POST["acc_email"];
                // Load the account model
                $accountmodel = $this->load->model("accountmodel");
                // Check if the email exists in the database
                $checkmail = $accountmodel->checkemail("account", $email);
                if($checkmail == 1) {
                    // Email exists, proceed with sending the email
                    // Instantiate the Mailer class
                    $mailer = new Mailer();
        
                    // Compose the email content
                    $title = "Password Reset Request";
                    $email_encode = base64_encode($email);
                    $href = BASE_URL."/account_user/reset_password?secret=".$email_encode;
                    $content = "Vui lòng click vào <a href=".$href.">đây</a> để khôi phục mật khẩu của bạn";
        
                    // Send the email
                    $send_mail_success = $mailer->sendMail($title, $content, $email);
                    if($send_mail_success) {
                        $message = "Chúng tôi đã gửi tin nhắn vào email của bạn!";
                        header("Location:".BASE_URL."/account_user/sign_in?msg=".$message);
                        exit();
                    }
                } else {
                    // Email doesn't exist, redirect with error message
                    $error = "Tài khoản không có trên hệ thống!";
                    header("Location:".BASE_URL."/account_user/forgot_password?msg=".$error);
                    exit();
                }
            } else {
                // Email parameter not provided, handle accordingly
                echo "Recipient email not provided.";
            }
        }

        public function update_password($id) {
            $accountmodel = $this->load->model("accountmodel");
            $table = "account";
            $cond = "account.acc_id = '$id'";

            $acc_password = md5($_POST["acc_password"]);
            $data = array(
                "acc_password" => $acc_password
            );
            
            $result = $accountmodel->updatepassword($table, $data, $cond);
            if($result == 1) {
                $message = "Cập nhật mật khẩu thành công";
                header("Location:".BASE_URL."/account_user/sign_in?msg=".$message);
                exit();
            } else {
                $error = "Cập nhật mật khẩu thất bại";
                header("Location:".BASE_URL."/account_user/reset_password?error=".$error);
                exit();
            }
        }
        
    }
?>