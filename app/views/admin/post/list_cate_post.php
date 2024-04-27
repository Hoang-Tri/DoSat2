<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
    }
?>

<h4 style="margin-top: 30px">Liệt kê danh mục bài viết</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên bài viết</th>
                        <th>Mô Tả bài viết</th>
                        <th class="text-right">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($cate_post as $key => $value_cate_post) {
                            $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value_cate_post["cate_post_name"] ?></td>
                        <td><?php echo $value_cate_post["cate_post_desc"] ?></td>
                        <td class="td-actions text-right">
                            <a href="<?php echo BASE_URL ?>/post/edit_cate_post/<?php echo $value_cate_post["cate_post_id"]?>" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/post/delete_cate_post/<?php echo $value_cate_post["cate_post_id"] ?>" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
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