<h4 style="margin-top: 30px">Liệt kê thương hiệu</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên thành phố</th>
                        <th>Phí vận chuyển</th>
                        <th class="text-right">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($fee as $key => $value) {
                            $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value["name"] ?></td>
                        <td><?php echo $value["fee_fee"] ?></td>
                        <td class="td-actions text-right">
                            <a href="<?php echo BASE_URL ?>/fee/edit_fee/<?php echo $value["fee_id"]?>" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/fee/delete_fee/<?php echo $value["fee_id"] ?>" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
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