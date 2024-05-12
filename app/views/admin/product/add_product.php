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
            <div class="form-group mb-3">
                <label for="pro_title">Tên sản phẩm</label>
                <input type="text" name="pro_title" class="form-control" id="pro_title">
            </div>
            <div class="form-group mb-3">
                <label for="pro_desc">Mô tả sản phẩm</label>
                <textarea class="form-control add_product" name="pro_desc" id="pro_id" rows="6" placeholder="Nhập vào nội dung"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="pro_price">Giá sản phẩm</label>
                <input type="text" name="pro_price" class="form-control" id="pro_price">
            </div>
            <div class="form-group mb-3">
                <label for="pro_quantity">Số lượng sản phẩm</label>
                <input type="text" name="pro_quantity" class="form-control" id="pro_quantity">
            </div>
            <div class="form-group mb-3">
                <label for="pro_size">Size/Weight</label>
                <input type="text" name="pro_size" class="form-control" id="pro_size">
            </div>
            <div class="form-group mb-3">
                <label for="pro_image">Hình ảnh sản phẩm</label>
                <input type="file" name="pro_image" class="form-control" id="pro_image">
            </div>
            <div class="form-group mb-4">
                <label for="brand" class="form-label">Thương hiệu</label>
                <select class="form-select" name="pro_brand_id" id="pro_brand_id">
                <?php 
                    foreach($brand as $key => $value) {
                    ?>
                        <option value="<?php echo $value['brand_id'] ?>"><?php echo $value['brand_name'] ?></option>
                    <?php 
                    } 
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


