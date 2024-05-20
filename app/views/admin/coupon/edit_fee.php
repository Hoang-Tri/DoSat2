<h4 style="margin-top: 30px;">Cập nhật phí vận chuyển</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-8">
        <?php 
            foreach($fee as $key => $value) {
        ?>
        <form>
            <div class="mb-3">
                <label for="cate_post" class="form-label">Tỉnh thành phố</label>
                <select class="form-select city" name="city" id="city">
                    <option value="<?php echo $value['matp'] ?>"><?php echo $value['name'] ?></option>
                </select>
            </div>

            <div class="mb-3">
                <label for="post_title" class="form-label">Phí vận chuyển</label>
                <input value="<?php echo $value['fee_fee'] ?>" type="text" class="form-control fee_fee" name="fee_fee" id="fee_fee" placeholder="Nhập vào phí vận chuyển">
            </div>
            <input type="hidden" class="fee_id" name="fee_id" value="<?php echo $value['fee_id'] ?>">
            <!-- Submit button -->
            <button type="button" class="btn btn-primary update_fee">Cập nhật phí vận chuyển</button>
        </form>
        <?php 
            } 
        ?>
    </div>
</div>


