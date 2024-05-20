<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>

<h4 style="margin-top: 30px;">Thêm mã giảm giá</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <form action="<?php echo BASE_URL ?>/coupon/insert_coupon" method="post">
            <div class="form-group mb-3">
                <label for="coupon_code">Mã giảm giá</label>
                <input type="text" name="coupon_code" class="form-control" id="coupon_code">
            </div>
            <div class="form-group mb-3">
                <label for="coupon_desc">Mô tả mã giảm giá</label>
                <input type="text" name="coupon_desc" class="form-control" id="coupon_desc" placeholder="Nhập vào nội dung">

            </div>
            <div class="form-group mb-3">
                <label for="coupon_times">Số lượng mã</label>
                <input type="text" name="coupon_times" class="form-control" id="coupon_times">
            </div>

            <div class="form-group mb-4">
                <label for="coupon_form" class="form-label">Giảm giá theo</label>
                <select class="form-select" name="coupon_form" id="coupon_form">
                    <option value="1">Giảm giá theo phần trăm</option>
                    <option value="2">Giảm giá theo giá tiền</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="coupon_sale" class="form-label">Phàn trăm giảm hoặc số giá tiền giảm</label>
                <input type="text" class="form-control" name="coupon_sale" id="coupon_sale" placeholder="Phần trăm và số tiền">
            </div>

            <!-- Submit button -->
            <button class="btn btn-primary">Thêm mã giảm giá</button>
        </form>
    </div>
</div>


