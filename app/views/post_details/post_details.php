<!-- Main -->
<?php 
    foreach ($post_details as $key => $post) {
        $post_title = $post['post_title'];
        $post_content = $post['post_content'];
        $cate_post_name = $post['cate_post_name'];
        $cate_post_id = $post['cate_post_id'];
    }    
?>
<main class="product">
    <div class="container">
        <!-- Search -->
        <div class="product__container">
            <div class="search d-none d-md-flex">
                <input type="text" name="" placeholder="Search for item" id="" class="search__input" />
                <button class="search__btn">
                    <img src="<?php echo BASE_URL ?>/assets/icons/search.svg" alt="" class="search__icon icon" />
                </button>
            </div>
        </div>
        <!-- Breadcrumb -->
        <div class="product__container">
            <div class="breadcrumb">
                <ul class="breadcrumb__list">
                    <li>
                        <a href="<?php echo BASE_URL ?>" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL ?>/post_user/post/<?php echo $cate_post_id ?>" class="breadcrumb__item">
                            <?php echo $cate_post_name ?>
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="#!" class="breadcrumb__item breadcrumb__item--active">
                            <?php echo $post_title ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Details blog -->
        <div class="blog__content">
            <div class="row">
                <div class="col-12">
                    <div class="text-content">
                        <p>
                            <?php echo $post_content ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart blog__container">
        <h2 class="cart__heading">Bài viết liên quan</h2>
        <!-- payment delivery 1 -->
        <?php
        foreach ($related as $key => $post) {
        ?>
        <a href="<?php echo BASE_URL ?>/post_user/post_details/<?php echo $post['post_id'] ?>">
            <article class="payment__item">
                <img src="<?php echo BASE_URL ?>/assets/uploads/post/<?php echo $post['post_img'] ?>" alt="" class="payment__thumb blog__thumb" />
                <div class="payment__item-content">
                    <div class="payment__item-info">
                        <h3 class="payment__heading"><?php echo $post['post_title'] ?></h3>
                        <p class="payment__desc payment__desc--low"><?php echo substr($post['post_content'],0,100) ?></p>
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
</main>