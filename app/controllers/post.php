<?php
    class Post extends DController {
        public function __construct() {
            // lay tat ca cua thanh cha
            parent::__construct();
        }

        function chitietpost() {
            echo "Chi tiet post";
        }

        function loaipost() {
            echo "Loai post";
        }
    }
?>