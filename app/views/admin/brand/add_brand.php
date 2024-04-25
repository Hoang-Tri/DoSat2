<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px;">Thêm thương hiệu</h4>
<div style="margin-top: 50px" class="row">
    <div class="col-6">
        <form method="post" action="<?php echo BASE_URL?>/brand/insert_brand">
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="brand_name">Tên thương hiệu</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control" required  autocomplete="off"/>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="brand_desc">Miêu tả thương hiệu</label>
                <textarea name="brand_desc" id="brand_desc" class="form-control" required ></textarea>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
        </form>
    </div>
</div>


