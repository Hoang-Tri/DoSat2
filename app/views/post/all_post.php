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

                    <li>
                        <a href="#!" class="breadcrumb__item breadcrumb__item--active">
                            Tất cả bài viết
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

     <!-- Browse Categories -->
     <section class="home__container">
        <div class="home__row">
            <h2 class="home__heading">Tất cả bài viết</h2>
        </div>
    </section>

    <div class="cart blog__container">
        <!-- payment delivery 1 -->
        <?php
        foreach ($allpost as $key => $value) {
        ?>
        <a href="<?php echo BASE_URL ?>/post_user/post_details">
            <article class="payment__item">
                <img src="<?php echo BASE_URL ?>/assets/uploads/post/<?php echo $value['post_img'] ?>" alt="" class="payment__thumb blog__thumb" />
                <div class="payment__item-content">
                    <div class="payment__item-info">
                        <h3 class="payment__heading"><?php echo $value['post_title'] ?></h3>
                        <p class="payment__desc payment__desc--low"><?php echo $value['post_content'] ?></p>
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