<?php
    class Category extends DController {
        public function __construct() {
            $data = array();
            $message = array();
            // lay tat ca cua thanh cha
            parent::__construct();
        }
        
        public function index() {
            $this->category();
        }
        
        // lay danh muc
        public function category() {
            $this->load->view("header");
            $categoryModel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";
            $data["category"] = $categoryModel->category($tbl_cate_pro);
            $this->load->view("category", $data);
            $this->load->view("footer");
        }


        // ================================Select Category============================
        // lay danh muc tu id
        public function categorybyid() {
            $this->load->view("header");
            $categorymodel = $this->load->model("categorymodel");
            $id = 1;
            $tbl_cate_pro = "category_product";
            $data["categorybyid"] = $categorymodel->categorybyid($tbl_cate_pro, $id);
            $this->load->view("categorybyid", $data);
            $this->load->view("footer");
        }


        // ================================Insert Category============================
        // xu ly  them danh muc
        public function insertcategory() {
            $categorymodel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";

            $title = $_POST["title"];
            $desc = $_POST["desc"];

            $data = array(  
                "cate_pro_title" => $title,
                "cate_pro_desc" => $desc
            );

           $result = $categorymodel->insertcategory($tbl_cate_pro, $data);
           //result neu them thanh cong thi bang 1 khong bang 0

           if($result == 1) {
                $message["msg"] = "Add data success";
           }else if($result == 0) {
                $message["msg"] = "Add date fail";
           }
           $this->load->view("addcategory", $message);
        }

        public function addcategory() {
            $this->load->view("addcategory");
        }

        // ================================Update Category============================
        // xu ly cap nhat danh muc
        public function updatecategory() {
            $categorymodel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";

            // $title = $_POST["title"];
            // $desc = $_POST["desc"];

            $id = 4;
            $cond = "category_product.cate_pro_id = $id";
            $data = array(
                "cate_pro_title" => "Iphone 12 pro",
                "cate_pro_desc" => "dien thoai tam trung gia re nha anh chi"
            );

           $result = $categorymodel->updatecategory($tbl_cate_pro, $data, $cond);

           if($result == 1) {
                echo "Add data success";
           }else if($result == 0) {
                echo "Add date fail";
           }
        }

         // ================================Dalete Category============================
        // xu ly cap nhat danh muc
        public function deletecategory() {
            $categorymodel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";

            $id = 11;
            $cond = "category_product.cate_pro_id = $id";
            $result = $categorymodel->deletecategory($tbl_cate_pro, $cond);
           //result neu them thanh cong thi bang 1 khong bang 0

           if($result == 1) {
                echo "Delete data success";
           }else if($result == 0) {
                echo "Delete date fail";
           }
        }
    }
?>