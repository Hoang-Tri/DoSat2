<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>
<h4 style="margin-top: 30px;">Cập nhật sản phẩm </h4>
<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <?php 
            foreach($productbyid as $key => $pro) { 
        ?>
        <form method="post" action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['pro_id'] ?>" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="email">Tên sản phẩm</label>
                <input type="text" value="<?php echo $pro['pro_title'] ?>" name="pro_title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Mô tả sản phẩm</label>
                <textarea name="pro_desc" rows="5" style="resize:none" class="form-control edit_product"><?php echo $pro['pro_desc'] ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="email">Giá sản phẩm</label>
                <input type="text" value="<?php echo $pro['pro_price'] ?>" name="pro_price" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label for="email">Số lượng sản phẩm</label>
                <input type="text" value="<?php echo $pro['pro_quantity'] ?>" name="pro_quantity" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label for="email">Hình ảnh sản phẩm</label>
                <input type="file" value="<?php echo $pro['pro_image'] ?>" name="pro_image" class="form-control" >
                <p><img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $pro['pro_image'] ?>" height = "100" width = "100"> </p>
            </div>
            <div class="form-group mb-3">
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
        <?php 
            }
        ?>
    </div>
</div>


