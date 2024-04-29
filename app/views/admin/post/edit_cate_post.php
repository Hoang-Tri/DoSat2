<h4 style="margin-top: 30px;">Cập nhật thương hiệu</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <?php 
            foreach($catepostbyid as $key => $cate_post) {
        ?>
        <form method="post" action="<?php echo BASE_URL?>/post/update_cate_post/<?php echo $cate_post['cate_post_id'] ?>">
            <div class="mb-3">
                <label class="form-label" for="cate_post_name">Tên thương hiệu</label>
                <input type="text" name="cate_post_name" class="form-control" id="cate_post_name" value="<?php echo $cate_post['cate_post_name'] ?> " required autocomplete='off'>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cate_post_desc">Miêu tả thương hiệu</label>
                <textarea name="cate_post_desc" class="form-control edit_cate_post" id="cate_post_desc" rows="3" required>
                    <?php echo $cate_post['cate_post_desc'] ?>
                </textarea>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Cập nhật thương hiệu</button>
        </form>

        <?php 
            }
        ?>
    </div>
</div>


