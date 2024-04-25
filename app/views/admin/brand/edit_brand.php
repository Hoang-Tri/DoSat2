<h4 style="margin-top: 30px;">Cập nhật thương hiệu</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <?php 
            foreach($brandbyid as $key => $brand) {
        ?>
        <form method="post" action="<?php echo BASE_URL?>/brand/update_brand/<?php echo $brand['brand_id'] ?>">
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="brand_name">Tên thương hiệu</label>
                <input type="text" value="<?php echo $brand['brand_name'] ?>" name="brand_name" id="brand_name" class="form-control" required  autocomplete="off"/>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="brand_desc">Miêu tả thương hiệu</label>
                <textarea name="brand_desc" class="form-control" id="brand_desc" rows="4" required>
                    <?php echo $brand['brand_desc'] ?>
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


