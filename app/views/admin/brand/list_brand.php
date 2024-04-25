<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px">Liệt kê thương hiệu</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên Thương Hiệu</th>
                        <th>Mô Tả Thương Hiệu</th>
                        <th class="text-right">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($brand as $key => $value_brand) {
                            $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value_brand["brand_name"] ?></td>
                        <td><?php echo $value_brand["brand_desc"] ?></td>
                        <td class="td-actions text-right">
                            <a href="<?php echo BASE_URL ?>/brand/edit_brand/<?php echo $value_brand["brand_id"]?>" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/brand/delete_brand/<?php echo $value_brand["brand_id"] ?>" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>