<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<h4 style='color: red; font-weight: bold;'>".$error_message."</h4>";
    }
?>

<h4 style="margin-top: 30px">Liệt kê bài viết</h4>

<div style="margin-top: 50px" class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 2%" class="text-center">#</th>
                        <th style="width: 20%">Tiêu đề bài viết</th>
                        <th style="width: 41%">Nội dung bài viết</th>
                        <th style="width: 12%">Hình ảnh bài viết</th>
                        <th style="width: 15%">Thuộc danh mục bài viết</th>
                        <th style="width: 8%" class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach($post as $key => $value_post) {
                            $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value_post["post_title"] ?></td>
                        <td><?php echo $value_post["post_content"] ?></td>
                        <td><img class="admin_post-img" src="<?php echo BASE_URL?>/assets/uploads/post/<?php echo $value_post["post_img"] ?>" alt=""></td>
                        <td><?php echo $value_post["cate_post_name"] ?></td>
                        <td class="text-center">
                            <a href="<?php echo BASE_URL ?>/post/edit_post/<?php echo $value_post["post_id"]?>" class="btn btn-success btn-sm" role="button">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?php echo BASE_URL ?>/post/delete_post/<?php echo $value_post["post_id"] ?>" class="btn btn-danger btn-sm" role="button">
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
