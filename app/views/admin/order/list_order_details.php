<h4 style="margin-top: 30px">Quản lí chi tiết đơn hàng</h4>

<div style="margin: 50px 0" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ cụ thể</th>
                        <th>Sản phẩm</th>
                        <th>Só lượng</th>
                        <th>Giá</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($order_details as $key => $value) {
                            $order_code = $value['order_code'];
                            $i++;
                        ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value["order_code"] ?></td>
                        <td><?php echo $value["cus_name"] ?></td>
                        <td><?php echo $value["cus_phone"] ?></td>
                        <td><?php echo $value['cus_wards'].", ".$value['cus_district'].", ".$value['cus_province'] ?></td>
                        <td><img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $value['pro_image'] ?>" height = "100" width = "100"> </td>
                        <td><?php echo $value["order_details_quantity"] ?></td>
                        <td><?php echo $value["order_details_price"] ?></td>
                        <td><?php echo $value["order_details_size"] ?></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <form action="<?php echo BASE_URL?>/order/update_order_status/<?php echo $order_code ?>" method="post">
            <input type="hidden" name="order_status" value="1">
            <button class="btn btn-primary">Bàn giao cho đơn vị vận chuyển</button>
        </form>
    </div>
</div>