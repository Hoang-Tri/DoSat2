<!-- Browse Products -->
<div class="container">
    <section class="home__container">
        <!-- Breadcrumb -->
        <div class="product__container">
            <div class="breadcrumb">
                <ul class="breadcrumb__list">
                    <li>
                        <a href="<?php echo BASE_URL ?>/index" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <?php 
                    $name = "Đang cập nhật...";
                    foreach ($postincatepost as $key => $value) {
                        $name = $value['cate_post_name'];
                    }    
                    ?>
                    <li>
                        <a href="#!" class="breadcrumb__item breadcrumb__item--active">
                            <?php echo $name ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

     <!-- Browse Categories -->
     <section class="home__container">
        <div class="home__row">
            <h2 class="home__heading"><?php echo $name ?></h2>
        </div>
    </section>

    <div class="cart blog__container">
        <!-- payment delivery 1 -->
        <?php
        foreach ($postincatepost as $key => $post) {
        ?>
        <a href="<?php echo BASE_URL ?>/post_user/post_details/<?php echo $post['post_id'] ?>">
            <article class="payment__item">
                <img src="<?php echo BASE_URL ?>/assets/uploads/post/<?php echo $post['post_img'] ?>" alt="" class="payment__thumb blog__thumb" />
                <div class="payment__item-content">
                    <div class="payment__item-info">
                        <h3 class="payment__heading"><?php echo $post['post_title'] ?></h3>
                        <p class="payment__desc payment__desc--low"><?php echo substr($post['post_content'],0 ,100)  ?></p>
                        <a style="margin-top: 10px; display: block;" href="<?php echo BASE_URL ?>/post_user/post_details/<?php echo $post['post_id'] ?>">Xem thêm >></a>
                    </div>
                </div>
            </article>
        </a>
        <?php 
        }
        ?>
    </div>
</div>
<div style="margin-bottom: 30px" class="mb"></div>