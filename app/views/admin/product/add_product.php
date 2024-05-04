<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>
<h4 style="margin-top: 30px;">Thêm sản phẩm</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <form method="post" action="<?php echo BASE_URL?>/product/insert_product" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pro_title">Tên sản phẩm</label>
                <input type="text" name="pro_title" class="form-control" id="pro_title">
            </div>
            <div class="form-group">
                <label for="pro_desc">Mô tả sản phẩm</label>
                <textarea name="pro_desc" rows="5" style="resize:none" class="form-control" id="pro_desc"></textarea>
            </div>
            <div class="form-group">
                <label for="pro_price">Giá sản phẩm</label>
                <input type="text" name="pro_price" class="form-control" id="pro_price">
            </div>
            <div class="form-group">
                <label for="pro_quantity">Số lượng sản phẩm</label>
                <input type="text" name="pro_quantity" class="form-control" id="pro_quantity">
            </div>
            <div class="form-group">
                <label for="pro_image">Hình ảnh sản phẩm</label>
                <input type="file" name="pro_image" class="form-control" id="pro_image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


