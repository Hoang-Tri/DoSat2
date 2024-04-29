<h4 style="margin-top: 30px;">Cập nhật bài viết </h4>
<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <?php 
            foreach($postbyid as $key => $post) {
        ?>
        <form method="post" action="<?php echo BASE_URL?>/post/update_post/<?php echo $post['post_id'] ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="post_title" class="form-label">Tiêu đề bài viết</label>
                <input value="<?php echo $post['post_title'] ?>" type="text" class="form-control" name="post_title" id="post_title" placeholder="Nhập vào tiêu đề bài viết">
            </div>
            <div class="mb-3">
                <label for="post_content" class="form-label">Nội dung bài viết</label>
                <textarea class="form-control edit_post" name="post_content" id="post_content" rows="6" placeholder="Nhập vào nội dung bài viết">
                    <?php echo $post['post_content'] ?>
                </textarea>
            </div>

            <div class="mb-3">
                <label for="post_img" class="form-label">Hình ảnh bài viết</label>
                <input value="<?php echo $post['post_img'] ?>" type="file" class="form-control" name="post_img" id="post_img">
                <label for="post_img">
                <img class="admin_post-img" src="<?php echo BASE_URL?>/assets/uploads/post/<?php echo $post["post_img"] ?>" alt="">
                </label>
            </div>

            <div class="mb-3">
                <label for="cate_post" class="form-label">Danh mục bài viết</label>
                <select class="form-select" name="cate_post" id="cate_post">
                <?php 
                    foreach($cate_post as $key => $value) {
                ?>
                    <option <?php if($value['cate_post_id'] == $post['cate_post_id']) {
                        echo "selected";
                        }?>
                        value="<?php echo $value['cate_post_id'] ?>">
                        <?php echo $value['cate_post_name'] ?>
                    </option>
                <?php 
                    } 
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php 
            }
        ?>
    </div>
</div>


