<?php
    class product extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

        function chitietsanpham($id = null) {
            echo "Chi tiet san pham";
        }

        function loaisanpham() {
            echo "Loai san pham";
        }
    }
?>