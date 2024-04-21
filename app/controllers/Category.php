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
            $homeModel = $this->load->modal("homeModel");
            $tbl_cate_pro = "category_product";
            $data["category"] = $homeModel->selectTbl($tbl_cate_pro);
            $this->load->view("category", $data);
            $this->load->view("footer");
        }

        // lay danh muc tu id
        public function categoryByIdDisplay() {
            $this->load->view("header");
            $homeModel = $this->load->modal("homeModel");
            $id = 1;
            $tbl_cate_pro = "category_product";
            $data["categorybyid"] = $homeModel->selectTblCategoryById($tbl_cate_pro, $id);
            $this->load->view("categorybyid", $data);
            $this->load->view("footer");
        }
    }
?>