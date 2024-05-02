<?php
    class Admin_login extends DController {
        public function __construct() {
            $message = array();
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->login();
        }
        // do index ke thua DController ne duoc su dung tat ca cai gi Dctrl su dung
        public function login() {
            Session::init();
            if(Session::get("login") == true) {
                header("Location:".BASE_URL."/admin_login/dashboard");
            }
            $this->load->view("admin/header");
            $this->load->view("admin/login");
            $this->load->view("admin/footer");
        }


        // Login admin
        public function dashboard() {
            Session::init();
            if(Session::get("login") == false) {
                header("Location:".BASE_URL."/admin_login");
            }
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");
            $this->load->view("admin/dashboard");
            $this->load->view("admin/footer");
        }
        public function authentication_login() {

            $username = $_POST["ad_username"];
            $password = md5($_POST["ad_password"]);

            $tbl_admin = "admin";
            $modeladmin = $this->load->model("loginmodel");

            $count = $modeladmin->login($tbl_admin, $username, $password);
            if($count == 1) {
                // KHI DANG KIEM TRA DANG NHAP XONG ROI
                $result = $modeladmin->getlogin($tbl_admin, $username, $password);
                Session::init();
                Session::set("login", true); //SET MOT SESSION LOGIN
                Session::set("ad_username", $result[0]["ad_username"]);
                Session::set("ad_id", $result[0]["ad_id"]);
                header("Location:".BASE_URL."/admin_login/dashboard");
            }else if($count == 0) {
                $message["msg"] = "Login is not success";
                $this->load->view("admin/login", $message);
           }
        }

        public function logout() {
            Session::init();
            Session::unsetSession("login");
            header("Location:".BASE_URL."/admin_login");
            
        }
    }
?>