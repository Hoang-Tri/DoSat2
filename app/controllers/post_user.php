<?php
    class Post_user extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->post();
        }

        // List ra danh mục bài viết (blog)
        public function post($id = '') {
            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_post = "post";

            $categorymodel = $this->load->model("categorymodel");
            $postmodel = $this->load->model("postmodel");


            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            $data["postincatepost"] = $postmodel->postbyid_home($tbl_post, $tbl_cate_post, $id);
            
            $this->load->view("doctype");
            $this->load->view("post/title_post");
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("post/post", $data);
            $this->load->view("footer");
        }

        public function allpost() {
            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_post = "post";

            $categorymodel = $this->load->model("categorymodel");
            $postmodel = $this->load->model("postmodel");


            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            $data["allpost"] = $postmodel->post_home($tbl_post);

            


            $this->load->view("doctype");
            $this->load->view("post/title_post");
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("post/all_post", $data);
            $this->load->view("footer");
        }

        // Chi tiết bài viết tại đây
        public function post_details($id = '') {
            $tbl_brand = "brand";
            $tbl_cate_post = "category_post";
            $tbl_post = "post";
            $cond = "$tbl_post.cate_post_id = $tbl_cate_post.cate_post_id
            AND $tbl_post.post_id = '$id'";

            $categorymodel = $this->load->model("categorymodel");
            $postmodel = $this->load->model("postmodel");


            $data["brand"] = $categorymodel->brand($tbl_brand);
            $data["cate_post"] = $categorymodel->cate_post_home($tbl_cate_post);
            $data["post_details"] = $postmodel->post_details($tbl_post, $tbl_cate_post, $cond);

            foreach( $data["post_details"] as $key => $cate_post) {
                $cate_post_id = $cate_post["cate_post_id"];
            }
            $cond_related = "$tbl_post.cate_post_id = $tbl_cate_post.cate_post_id
            AND $tbl_cate_post.cate_post_id = '$cate_post_id' AND $tbl_post.post_id NOT IN('$id')";
            $data["related"] = $postmodel->related_post_home($tbl_post, $tbl_cate_post, $cond_related);


            $this->load->view("doctype");
            $this->load->view("post_details/title_post_details");
            session_start();
            if(isset($_SESSION['account']) && $_SESSION['account'] == true) {
                $this->load->view("header_login", $data);
            }else {
                $this->load->view("header", $data);
            }
            $this->load->view("post_details/post_details", $data);   
            $this->load->view("footer");
        }
    }
?>