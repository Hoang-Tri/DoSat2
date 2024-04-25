<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>


<h1 style="text-align: center; margin-bottom: 50px;">Thêm danh mục sản phẩm</h1>
<div class="row row-cols-8 offset-4">
    <div class="col">
        <form style="width: 22rem;" method="post" action="<?php echo BASE_URL?>/product/insert_product">
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="cate_pro_title">Tên danh mục</label>
                <input type="text" name="cate_pro_title" id="cate_pro_title" class="form-control" required  autocomplete="off"/>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="cate_pro_desc">Miêu tả danh mục</label>
                <input type="text" name="cate_pro_desc" id="cate_pro_desc" class="form-control" required autocomplete="off"/>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init style="width: 100%" type="submit" name="addcatepro" class="btn btn-primary btn-block mb-4">Thêm</button>
        </form>
    </div>
</div>


