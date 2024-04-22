<?php
    class CategoryModel extends DModel {
        function __construct() {
            parent::__construct();
        }

        public function category($tbl_cate_pro) {
            $sql = "SELECT * FROM $tbl_cate_pro";
            return $this->db->select($sql);
        }

        public function categoryById($tbl_cate_pro, $id) {
            $sql = "SELECT * FROM $tbl_cate_pro WHERE cate_pro_id =:id";
            $data = array(":id" => $id);
            return $this->db->select($sql, $data);
        }   

        public function insertCategory($tbl_cate_pro, $data) {
           return $this->db->insert($tbl_cate_pro, $data);
        }

        public function updateCategory($tbl_cate_pro, $data, $cond) {
            return $this->db->update($tbl_cate_pro, $data, $cond);
         }

         public function deleteCategory($tbl_cate_pro, $cond) {
            return $this->db->delete($tbl_cate_pro, $cond);
         }
    }
?>