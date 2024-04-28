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
                        <a href="<?php echo BASE_URL ?>/product-detail.html" class="breadcrumb__item breadcrumb__item--active">
                            Bài viết
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

     <!-- Browse Categories -->
     <section class="home__container">
        <div class="home__row">
            <h2 class="home__heading">Blog new</h2>
        </div>
        <!-- List categories  -->
        <div class="home__cate row row-cols-3 row-cols-md-1">
            <!-- categories item 1 -->
            <div class="col">
                <a href="#!">
                    <article class="cate-item">
                        <img src="<?php echo BASE_URL ?>/assets/img/category-item/product-1.png" alt="" class="cate-item__thumb" />

                        <div class="cate-item__info">
                            <h3 class="cate-item__title">$24 - $150</h3>
                            <p class="cate-item__desc">New sumatra mandeling coffe blend</p>
                        </div>
                    </article>
                </a>
            </div>

            <!-- categories item  2-->

            <div class="col">
                <a href="#!">
                    <article class="cate-item">
                        <img src="<?php echo BASE_URL ?>/assets/img/category-item/product-2.png" alt="" class="cate-item__thumb" />
                        <div class="cate-item__info">
                            <h3 class="cate-item__title">$37 - $160</h3>
                            <p class="cate-item__desc">Espresso arabica and robusta beans</p>
                        </div>
                    </article>
                </a>
            </div>

            <!-- categories item 3 -->
            <div class="col">
                <a href="#!"
                    ><article class="cate-item">
                        <img src="<?php echo BASE_URL ?>/assets/img/category-item/product-3.png" alt="" class="cate-item__thumb" />
                        <div class="cate-item__info">
                            <h3 class="cate-item__title">$32 - $160</h3>
                            <p class="cate-item__desc">Lavazza top class whole bean coffee blend</p>
                        </div>
                    </article></a
                >
            </div>
        </div>
    </section>

    <div class="cart blog__container">
        <!-- cart info user address -->
        <h2 class="cart__sub-heading">Total news</h2>
        <div class="cart__info-separate"></div>
        <h3 class="cart__sub-heading-lv2">Availeble Shipping method</h3>

        <!-- payment delivery 1 -->
        <a href="<?php echo BASE_URL ?>/index/post_details">
            <article class="payment__item">
                <img src="<?php echo BASE_URL ?>/assets/img/payment/payment-delivery-1.png" alt="" class="payment__thumb" />
                <div class="payment__item-content">
                    <div class="payment__item-info">
                        <h3 class="payment__heading">Fedex Delivery</h3>
                        <p class="payment__desc payment__desc--low">Delivery: 2-3 days work</p>
                    </div>
                </div>
            </article>
        </a>
    </div>
</div>
<div style="margin-bottom: 30px" class="mb"></div>