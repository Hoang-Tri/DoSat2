<?php
    class homeModel extends DModal {
        function __construct() {
            parent::__construct();
        }

        public function selectTbl ($tbl_cate_pro) {
           return $this->db->select($tbl_cate_pro);
        }

        public function selectTblCategoryById($tbl_cate_pro, $id) {
            $sql = "SELECT * FROM $tbl_cate_pro WHERE cate_pro_id =:id";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();

            return $statement->fetchAll();
        }
    }
?>