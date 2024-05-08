<!-- Browse Products -->
<div class="container">
    <section class="home__container">
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
                        <a href="#" class="breadcrumb__item">
                            Thương hiệu
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>
                    <?php 
                    $name = "Đang cập nhật...";
                    foreach ($proinbrand as $key => $value) {
                        $name = $value['brand_name'];
                    }    
                    ?>
                    <li>
                        <a href="./" class="breadcrumb__item breadcrumb__item--active">
                            <?php echo $name ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="home__row" style="margin-top: 20px">
            <h2 class="home__heading"><?php echo $name ?></h2>
        </div>
        <!-- List products -->
        <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
            <!-- Product card 1 -->
            <?php
                foreach($proinbrand as $key => $product) {

            ?>
            <div class="col">
                <article class="product-card">
                    <div class="product-card__img-wrap">
                        <a href="<?php echo BASE_URL ?>/product_user/product_details">
                            <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $product['pro_image'] ?>" alt="" class="product-card__thumb" />
                        </a>
                        <button class="like-btn product-card__like-btn">
                            <img src="<?php echo BASE_URL ?>/assets/icons/hearth.svg" alt="" class="like-btn__icon icon" />
                            <img src="<?php echo BASE_URL ?>/assets/icons/hearth-red.svg" alt="" class="like-btn__icon--liked" />
                        </button>
                    </div>
                    <h3 class="product-card__title">
                        <a href="<?php echo BASE_URL ?>/product_user/product_details"><?php echo $product['pro_title'] ?></a>
                    </h3>
                    <h4 class="product-card__brand"><?php echo $product['brand_name'] ?></h4>
                    <div class="product-card__row">
                        <span class="product-card__price"><?php echo number_format( $product['pro_price'],0,',','.' ).'đ'?></span>
                        <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" class="product-card__start" />
                        <span class="product-card__score">4.3</span>
                    </div>
                </article>
            </div>
            <?php 
                }
            ?>
        </div>
    </section>
</div>
<div style="margin-bottom: 30px" class="mb"></div>