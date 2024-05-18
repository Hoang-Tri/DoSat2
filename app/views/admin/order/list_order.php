<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>
<h4 style="margin-top: 30px">Quản lí đơn hàng</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th class="text-right">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($order as $key => $value) {
                            $i++;
                            if($value['order_status'] == 0) {
                                $order_status = 'Chưa giao cho vận chuyển';
                            }else {
                                $order_status = 'Đang vận chuyển';
                            }
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value["order_code"] ?></td>
                        <td><?php echo $value["order_date"] ?></td>
                        <td><?php echo  $order_status?></td>
                        <td class="td-actions text-right">
                            <a href="<?php echo BASE_URL ?>/order/list_order_details/<?php echo $value["order_code"]?>" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-regular fa-eye"></i>
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