<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px;">Thêm danh mục bài viết</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <form method="post" action="<?php echo BASE_URL?>/post/insert_cate_post">
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="cate_post_name">Tên danh mục bài viết</label>
                <input type="text" name="cate_post_name" id="cate_post_name" class="form-control" required  autocomplete="off"/>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="cate_post_desc">Miêu tả danh mục bài viết</label>
                <textarea name="cate_post_desc" id="cate_post_desc" class="form-control add_cate_post" required ></textarea>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Thêm danh mục bài viết</button>
        </form>
    </div>
</div>


