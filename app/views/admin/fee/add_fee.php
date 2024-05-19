<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px;">Thêm phí vận chuyển theo tỉnh thành phố</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <form>
            <div class="mb-3">
                <label for="cate_post" class="form-label">Tỉnh thành phố</label>
                <select class="form-select city" name="city" id="city">
                    <option value="">--Chọn tỉnh thành phố--</option>
                <?php 
                    foreach($province as $key => $value) {
                ?>
                    <option value="<?php echo $value['matp'] ?>"><?php echo $value['name'] ?></option>
                <?php 
                    } 
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="post_title" class="form-label">Phí vận chuyển</label>
                <input type="text" class="form-control fee_fee" name="fee_fee" id="fee_fee" placeholder="Nhập vào phí vận chuyển">
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary add_fee">Thêm phí vận chuyển</button>
        </form>
    </div>
</div>


