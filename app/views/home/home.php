<?php
// Ensure $max_price is defined
$min_price = isset($min_price) ? $min_price : 0;
$max_price = isset($max_price) ? $max_price : 50000;
?>

<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>
<div
 class="container home">
    <!-- Main -->
    <div class="home__container">
        <!-- SlideShow -->
        <div class="slider">
            <div class="slider__inner">
                <div class="slider__item">
                    <a href="#!" class="slider__link">
                        <picture>
                            <source
                                media="(max-width: 767.98px)"
                                srcset="<?php echo BASE_URL ?>/assets/img/slidershow/slider-01-md.png"
                            />
                            <img src="<?php echo BASE_URL ?>/assets/img/slidershow/slider-01.png" alt="" class="slider__img" />
                        </picture>
                    </a>
                </div>
            </div>

            <!-- <div class="slider__page">
                <span class="slider__page-num">1</span>
                <span class="slider__page-item"></span>
                <span class="slider__page-num">5</span>
            </div> -->
        </div>
    </div>

    <!-- Browse Categories -->
    <section class="home__container" id="product">
        <div class="home__row">
            <h2 class="home__heading">Sản phẩm mới</h2>
        </div>
        <!-- List categories  -->
        <div class="home__cate row row-cols-3 row-cols-md-1">
            <!-- categories item 1 -->
            <?php
                foreach($productnew as $key => $product) {
                    if($product['pro_new']==1){
            ?>
            <div class="col">
                <a href="#!">
                    <article class="cate-item">
                        <!-- <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $product['pro_image'] ?>" alt="" class="cate-item__thumb" /> -->
                        <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $product['pro_id'] ?>">
                                <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $product['pro_image'] ?>" alt="" class="cate-item__thumb" />
                            
                        <div class="cate-item__info">
                            <h3 class="cate-item__title"><?php echo number_format( $product['pro_price'],0,',','.' ).'đ'?></h3>
                            <p class="cate-item__desc cate-item__title payment__desc--low"><?php echo substr($product['pro_title'],0,100) ?></p>
                        </a>    
                    </article>
                </a>
            </div>
            <?php 
                    }
                }
            ?>

            <!-- categories item  2-->
            
            <!-- categories item 3 -->
        </div>
    </section>

    <!-- Browse Products -->
    <section class="home__container">
        <div class="home__row">
            <h2 class="home__heading">Tất cả sản phẩm</h2>
            <div class="filter-wrap">
                <button class="filter-btn js-toggle" toggle-target="#home__filter">
                    Filter
                    <img src="<?php echo BASE_URL?>/assets/icons/fillter.svg" alt="" class="icon filter-btn__icon" />
                </button>
                <form action="<?php echo BASE_URL ?>/product_user/filter_product" class="form" method ="post">
                    <div class="filter hide" id="home__filter">
                        <img src="<?php echo BASE_URL?>/assets/icons/arrow-up.png" alt="" class="filter-icon" />
                        <form action="<?php echo BASE_URL ?>/product_user/filter_product" class="form" method ="post">
                            <div class="filter__row filter__content">
                                <!-- Filter colums 1 -->
                                <div class="filter__col">
                                    <label for="" class="form__label">Price</label>
                                    <div class="filter__form-group filter__form-group--inline">
                                        <div>
                                            <label for="" class="form__label form__label--small">Minimum</label>
                                            <div class="filter__form-text-input filter__form-text-input-small">
                                                <input
                                                    type="text"
                                                    name="min_price"
                                                    id="min_price"
                                                    class="filter__form-input"
                                                    value="<?php echo $min_price ?>"
                                                />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="" class="form__label form__label--small">Maximum</label>
                                            <div class="filter__form-text-input filter__form-text-input-small">
                                                <input
                                                    type="text"
                                                    name="max_price"
                                                    id=""
                                                    class="filter__form-input"
                                                    value="<?php echo $max_price ?>"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="filter__separate"></div>
    
                                <!-- Filter colums 2 -->
                                <div class="filter__col">
                                    <label for="" class="form__label">Size/Weight</label>
                                    <div class="filter__form-group">
                                        <div class="form__select-wrap">
                                            <div class="form__select">
                                                <select name="size" id="size" class="form__select-select">
                                                <option value="X">X</option>
                                                <option value="M">M</option>
                                                <option value="XL">XL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- <div class="filter__separate"></div> -->
    
                                <!-- Filter colums 3 -->
                                <!-- <div class="filter__col">
                                    <label for="" class="form__label">Brand</label>
                                    <div class="filter__form-group">
                                        <div class="filter__form-text-input">
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                placeholder="Search brand name"
                                                class="filter__form-input"
                                            />
                                            <img
                                                src="<?php echo BASE_URL?>/assets/icons/search.svg"
                                                alt=""
                                                class="filter__form-input-icon icon"
                                            />
                                        </div>
                                    </div>
    
                                    <div class="filter__form-group">
                                        <div class="form__tags">
                                        <?php 
                                        foreach($brand as $key => $value) {
                                        ?>
                                        <button class="form__tag"><?php echo $value["brand_name"] ?></button>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
    
                            <div class="filter__row filter__footer">
                                <button
                                    class="btn btn--text filter__cancel js-toggle"
                                    toggle-target="#home__filter"
                                >
                                    Cancel
                                </button>
                                <button class="btn btn--primary filter__submit">Show Result</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <!-- List products -->
        <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
            <!-- Product card 1 -->
            <?php
                foreach($productall as $key => $pro) {
            ?>
                <div class="col">
                    <article class="product-card">
                        <div class="product-card__img-wrap">
                            <a id="wistlist_url<?php echo $pro['pro_id']?>" href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $pro['pro_id'] ?>">
                                <img id="wistlist_img<?php echo $pro['pro_id']?>" src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $pro['pro_image'] ?>" alt="" class="product-card__thumb" />
                            </a>
                            <button class="like-btn product-card__like-btn" id="<?php echo $pro['pro_id']?>" data-product-id="<?php echo $pro['pro_id']?>">
                                <img src="<?php echo BASE_URL ?>/assets/icons/hearth.svg" alt="" class="like-btn__icon icon" />
                                <img src="<?php echo BASE_URL ?>/assets/icons/hearth-red.svg" alt="" class="like-btn__icon--liked" />
                            </button>
                        </div>
                        <h3 class="product-card__title">
                            <a id="wistlist_name<?php echo $pro['pro_id']?>" href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $pro['pro_id'] ?>"><?php echo $pro['pro_title'] ?></a>
                        </h3>
                        <h4 id="wistlist_brand<?php echo $pro['pro_id']?>" class="product-card__brand"><?php echo $pro['brand_name'] ?></h4>
                        <div class="product-card__row">
                            <span class="product-card__price"><?php echo number_format( $pro['pro_price'],0,',','.' ).'đ'?></span>
                            <input type="hidden" name="product_price" id="wistlist_price<?php echo $pro['pro_id']?>" value="<?php echo $pro['pro_price'] ?>">
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
