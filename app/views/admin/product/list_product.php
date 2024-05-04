<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: red; font-weight: bold;'>".$error_message."</h4>";
    }
?>

<h4 style="margin-top: 30px">Liệt kê sản phẩm</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <!-- <th style="width: 2%" class="text-center">#</th> -->
                        <th style="width: 1%">STT</th>
                        <th style="width: 15%">Tên sản phẩm</th>
                        <th style="width: 30%">Mô tả sản phẩm</th>
                        <th style="width: 5%">Giá</th>
                        <th style="width: 5%">Số lượng</th>
                        <th style="width: 10%">Hình ảnh bài viết</th>
                        <th style="width: 10%" class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $id = 0; 
                        foreach($product as $key => $pro) {
                            $id++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $id ?></td>
                        <td><?php echo $pro['pro_title'] ?></td>
                        <td><?php echo $pro['pro_desc'] ?></td>
                        <td><?php echo number_format( $pro['pro_price'],0,',','.' ).'đ'?></td>
                        <td><?php echo $pro['pro_quantity'] ?></td>
                        <td><img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $pro['pro_image'] ?>" height = "100" width = "100"> </td>
                        <td class="text-center">
                            <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro["pro_id"]?>" class="btn btn-success btn-sm" role="button">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro["pro_id"] ?>" class="btn btn-danger btn-sm" role="button">
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
