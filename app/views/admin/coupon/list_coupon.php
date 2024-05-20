<h4 style="margin-top: 30px">Liệt kê mã giảm giá</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Mã giảm giá</th>
                        <th>Mô tả</th>
                        <th>Số lượng giảm giá</th>
                        <th>Hình thức giảm giá</th>
                        <th>Số tiền/phần trăm</th>
                        <th class="text-right">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($coupon as $key => $value) {
                            $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value["coupon_code"] ?></td>
                        <td><?php echo $value["coupon_desc"] ?></td>
                        <td><?php echo $value["coupon_times"] = 1 ? "Giảm giá theo phần trăm" : "Giảm giá theo giá tiền" ?></td>
                        <td><?php echo $value["coupon_form"] ?></td>
                        <td><?php echo $value["coupon_sale"] ?></td>
                        <td class="td-actions text-right">
                            <a href="<?php echo BASE_URL ?>/coupon/edit_coupon/<?php echo $value["coupon_id"]?>" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/coupon/delete_coupon/<?php echo $value["coupon_id"] ?>" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
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