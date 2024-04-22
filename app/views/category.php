<h2>
    <?php
        foreach($category as $key => $value) {
            echo "<br/>";
            echo $value["cate_pro_id"];
            echo "<br/>";
            echo $value["cate_pro_title"];
            echo "<br/>";
            echo $value["cate_pro_desc"];
        }
    ?>
</h2>