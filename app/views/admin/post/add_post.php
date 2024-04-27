<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px;">Thêm bài viết</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <form method="post" action="<?php echo BASE_URL?>/post/insert_post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="post_title" class="form-label">Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Nhập vào tiêu đề bài viết">
            </div>
            <div class="mb-3">
                <label for="post_content" class="form-label">Nội dung bài viết</label>
                <textarea class="form-control" name="post_content" id="post_content" rows="6" placeholder="Nhập vào nội dung bài viết"></textarea>
            </div>

            <div class="mb-3">
                <label for="post_img" class="form-label">Hình ảnh bài viết</label>
                <input type="file" class="form-control" name="post_img" id="post_img">
            </div>

            <div class="mb-3">
                <label for="cate_post" class="form-label">Danh mục bài viết</label>
                <select class="form-select" name="cate_post" id="cate_post">
                <?php 
                    foreach($cate_post as $key => $value) {
                ?>
                    <option value="<?php echo $value['cate_post_id'] ?>"><?php echo $value['cate_post_name'] ?></option>
                <?php 
                    } 
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


