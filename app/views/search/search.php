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
                            Từ khóa tìm kiếm
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>   
                    <li>
                        <a href="./" class="breadcrumb__item breadcrumb__item--active">
                            <?php echo $_POST['search'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="home__row"></div>
        <div class="home__row">
            <h2 class="home__heading">Sản phẩm tìm kiếm</h2>
        </div>
        <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
            <!-- Product card 1 -->
            <?php
                foreach($productsearch as $key => $pro) {
            ?>
                <div class="col">
                    <article class="product-card">
                        <div class="product-card__img-wrap">
                            <a  href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $pro['pro_id']?>" id="wistlist_url<?php echo $pro['pro_id']?>">
                                <img
                                    src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $pro['pro_image'] ?>"
                                    alt=""
                                    class="product-card__thumb"
                                    id="wistlist_img<?php echo $pro['pro_id']?>"
                                />
                            </a>
                            <button class="like-btn product-card__like-btn" id="<?php echo $pro['pro_id'] ?>">
                                <img
                                    src="<?php echo BASE_URL ?>/assets/icons/hearth.svg"
                                    alt=""
                                    class="like-btn__icon icon"
                                />
                                <img
                                    src="<?php echo BASE_URL ?>/assets/icons/hearth-red.svg"
                                    alt=""
                                    class="like-btn__icon--liked"
                                />
                            </button>
                        </div>
                        <h3 class="product-card__title">
                            <a 
                            id="wistlist_name<?php echo $pro['pro_id']?>"
                            href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $pro['pro_id'] ?>"><?php echo $pro['pro_title'] ?></a>
                        </h3>
                        <h4 id="wistlist_brand<?php echo $pro['pro_id']?>" class="product-card__brand"><?php echo $pro['brand_name'] ?></h4>
                        <div class="product-card__row">
                            <span class="product-card__price"><?php echo number_format( $pro['pro_price'],0,',','.' ).'đ'?></span>
                            <input type="hidden" name="product_price" id="wistlist_price<?php echo $pro['pro_id']?>" value="<?php echo $pro['pro_price'] ?>">
                            <img
                                src="<?php echo BASE_URL ?>/assets/icons/start.svg"
                                alt=""
                                class="product-card__start"
                            />
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