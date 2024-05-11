<!-- Main -->
<?php 
    foreach ($product_details as $key => $product) {
        $title = $product['pro_title'];
        $desc = $product['pro_desc'];
        $price = $product['pro_price'];
        $quantity = $product['pro_quantity'];
        $image = $product['pro_image'];
        $brand = $product['pro_brand_id'];
        $brand_name = $product['brand_name'];
        $id = $product['pro_id'];
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
                        <a href="<?php echo BASE_URL ?>/index-logined.html#product" class="breadcrumb__item">
                            Categories
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL ?>/product-detail.html" class="breadcrumb__item breadcrumb__item--active">
                            Product details
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Product detail -->
        <div class="product__container product__detail-container">
            <div class="row">
                <div class="col-5 col-lx-6 col-lg-12">
                    <div class="product-preview">
                        <div class="product-preview__list-wrap">
                            <div class="product-preview__list">
                                <div class="product-preview__item">
                                    <img
                                        src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $image ?>"
                                        alt=""
                                        class="product-preview__img"
                                    />
                                </div>

                                <div class="product-preview__item">
                                    <img
                                        src="<?php echo BASE_URL ?>/assets/img/product/item-2.png"
                                        alt=""
                                        class="product-preview__img"
                                    />
                                </div>
                                <div class="product-preview__item">
                                    <img
                                        src="<?php echo BASE_URL ?>/assets/img/product/item-3.png"
                                        alt=""
                                        class="product-preview__img"
                                    />
                                </div>
                                <div class="product-preview__item">
                                    <img
                                        src="<?php echo BASE_URL ?>/assets/img/product/item-4.png"
                                        alt=""
                                        class="product-preview__img"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="product-preview__thumbs">
                            <img
                                src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $image ?>"
                                alt=""
                                class="product-preview__thumbs-img product-preview__thumbs-img--current"
                            />

                            <img
                                src="<?php echo BASE_URL ?>/assets/img/product/item-2.png"
                                alt=""
                                class="product-preview__thumbs-img"
                            />

                            <img
                                src="<?php echo BASE_URL ?>/assets/img/product/item-3.png"
                                alt=""
                                class="product-preview__thumbs-img"
                            />
                            <img
                                src="<?php echo BASE_URL ?>/assets/img/product/item-4.png"
                                alt=""
                                class="product-preview__thumbs-img"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-7 col-lx-6 col-lg-12">
                    <form action="<?php echo BASE_URL ?>/cart_user/addtocart" method="post">
                        <input type="hidden" value="<?php echo $id ?>" name="pro_id">
                        <input type="hidden" value="<?php echo $_SESSION['acc_id'] ?>" name="acc_id">
                        <input type="hidden" value="1" name="cart_pro_quantity">
                        <div class="product-info">
                            <h1 class="product-info__heading"><?php echo $title ?></h1>
                            <div class="row">
                                <div class="col-6 col-xl-5 col-lg-12">
                                    <div class="product-prop">
                                        <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" class="product-prop__icon" />
                                        <div>
                                            <h4 class="product-prop__title">(3.5) 1100 reviews</h4>
                                            <p class="product-prop__desc"></p>
                                        </div>
                                    </div>
                                    <!-- form filter size-weight -->
                                    <form action="" class="form">
                                        <div class="product-filter">
                                            <label for="" class="form__label">Size/Weight</label>
                                            <div class="filter__form-group">
                                                <div class="form__select-wrap">
                                                    <div class="form__select">
                                                        <select name="" id="" class="form__select-select">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- col 2 -->
                                <div class="col-6 col-xl-7 col-lg-12">
                                    <div class="product-props">
                                        <div class="product-prop">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/document.svg"
                                                alt
                                                class="product-prop__icon icon"
                                            />
                                            <div>
                                                <h4 class="product-prop__title">Compare</h4>
                                                <p class="product-prop__desc"></p>
                                            </div>
                                        </div>
    
                                        <div class="product-prop">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/buy.svg"
                                                alt=""
                                                class="product-prop__icon icon"
                                            />
                                            <div>
                                                <h4 class="product-prop__title">Delivery</h4>
                                                <p class="product-prop__desc">From $6 for 1-3 days</p>
                                            </div>
                                        </div>
    
                                        <div class="product-prop">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/bag.svg"
                                                alt=""
                                                class="product-prop__icon icon"
                                            />
                                            <div>
                                                <h4 class="product-prop__title">Pickup</h4>
                                                <p class="product-prop__desc">Out of 2 store, today</p>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="product-info__card">
                                        <div class="product-info__row">
                                            <span class="product-info__price"><?php echo number_format ($price,0,',','.' ).'đ'?></span>
                                            <span class="product-info__tax">10%</span>
                                        </div>
    
                                        <span class="product-info__total">$540.00</span>
    
                                        <div class="product-info__row">
                                            <button class="btn btn--primary product-info__add-to-cart">
                                                Add to cart
                                            </button>
                                            <button class="like-btn product-info__like-btn like-btn__liked">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="product__container">
            <div class="product-tab js-tabs">
                <ul class="product-tab__list">
                    <li class="product-tab__item product-tab__item--current">Description</li>
                    <li class="product-tab__item">Review (1100)</li>
                    <li class="product-tab__item">Similar</li>
                </ul>

                <div class="product-tab__contents product-tab__contents-mt">
                    <!-- product tab 1 -->
                    <div class="product-tab__content product-tab__content--current">
                        <div class="row">
                            <div class="col-8 col-lg-12">
                                <div class="text-content">
                                    <?php echo $desc ?>  
                                </div>
                            </div>
                            <div class="col-4 d-lg-none">
                                <img src="<?php echo BASE_URL ?>/assets/img/avatar/avatar-2.png" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- product Reviews 3 -->
                    <div class="product-tab__content">
                        <h2 class="product-tab__heading">What our customers are saying</h2>
                        <div class="row row-cols-3 gx-lg-2 row-cols-md-1 gy-md-3">
                            <div class="col">
                                <!-- preview card 1 -->
                                <article class="preview-card">
                                    <div class="preview-card__avatar">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/img/avatar/avatar-1.png"
                                            alt=""
                                            class="preview-card__avatar-img"
                                        />
                                        <div class="preview-card__info">
                                            <h4 class="preview-card__title">Jakir Hussen</h4>
                                            <p class="preview-card__desc">
                                                Great product, I love this Coffee Beans
                                            </p>
                                        </div>
                                    </div>
                                    <div class="preview-card__rating">
                                        <div class="preview-card__star-wrap">
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                        </div>
                                        <span class="preview-card__score">(3.5) Review</span>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <!-- preview card 2 -->
                                <article class="preview-card">
                                    <div class="preview-card__avatar">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/img/avatar/avatar-2.png"
                                            alt=""
                                            class="preview-card__avatar-img"
                                        />
                                        <div class="preview-card__info">
                                            <h4 class="preview-card__title">Delwar Hussain</h4>
                                            <p class="preview-card__desc">
                                                Great product, I like this Coffee Beans
                                            </p>
                                        </div>
                                    </div>
                                    <div class="preview-card__rating">
                                        <div class="preview-card__star-wrap">
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                        </div>
                                        <span class="preview-card__score">(3.5) Review</span>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <!-- preview card 3 -->
                                <article class="preview-card">
                                    <div class="preview-card__avatar">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/img/avatar/avatar-3.png"
                                            alt=""
                                            class="preview-card__avatar-img"
                                        />
                                        <div class="preview-card__info">
                                            <h4 class="preview-card__title">Jubed Ahmed</h4>
                                            <p class="preview-card__desc">
                                                Awesome Coffee, I love this Coffee Beans
                                            </p>
                                        </div>
                                    </div>
                                    <div class="preview-card__rating">
                                        <div class="preview-card__star-wrap">
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                            <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" />
                                        </div>
                                        <span class="preview-card__score">(3.5) Review</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <!-- product tab 4 -->
                    <div class="product-tab__content">
                        <h2 class="product-tab__heading">Similar items you might like</h2>
                        <!-- List products -->
                        <div class="row row-cols-5 row-cols-lg-4 row-cols-md-2 row-cols-sm-1 g-2">
                            <!-- Product card 1 -->
                            <?php
                                foreach ($related as $key => $pro) {
                            ?>
                            <div class="col">
                                <article class="product-card">
                                    <div class="product-card__img-wrap">
                                        <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $pro['pro_id']?>">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $pro['pro_image'] ?>"
                                                alt=""
                                                class="product-card__thumb"
                                            />
                                        </a>
                                        <button class="like-btn product-card__like-btn">
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
                                        <a href="#!"><?php echo $pro['pro_title'] ?></a>
                                    </h3>
                                    <h4 class="product-card__brand"><?php echo $pro['brand_name'] ?></h4>
                                    <div class="product-card__row">
                                        <span class="product-card__price"><?php echo number_format( $product['pro_price'],0,',','.' ).'đ'?></span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>