<?php
    class Category extends DController {
        public function __construct() {
            $data = array();
            // lay tat ca cua thanh cha
            parent::__construct();
        }
        
        // lay danh muc
        public function categoryDisplay() {
            $this->load->view("header");
            $categoryModel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";
            $data["category"] = $categoryModel->category($tbl_cate_pro);
            $this->load->view("category", $data);
            $this->load->view("footer");
        }

        // lay danh muc tu id
        public function categoryByIdDisplay() {
            $this->load->view("header");
            $categorymodel = $this->load->model("categorymodel");
            $id = 1;
            $tbl_cate_pro = "category_product";
            $data["categorybyid"] = $categorymodel->categoryById($tbl_cate_pro, $id);
            $this->load->view("categorybyid", $data);
            $this->load->view("footer");
        }

        // them danh muc
        public function insertCategory() {
            $categorymodel = $this->load->model("categorymodel");
            $tbl_cate_pro = "category_product";

            $data = array(
                "cate_pro_title" => "Cafe nguyen chat do anh ui"
            );

            $result = $categorymodel->insertCategory($tbl_cate_pro, $data);
        }
    }
?>