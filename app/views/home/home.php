<div class="container home">
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

                <div class="filter hide" id="home__filter">
                    <img src="<?php echo BASE_URL?>/assets/icons/arrow-up.png" alt="" class="filter-icon" />
                    <h3 class="filter__heading">Filter</h3>
                    <form action="" class="filter__form form">
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
                                                name=""
                                                id=""
                                                class="filter__form-input"
                                                value="$30.00"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="" class="form__label form__label--small">Maximum</label>
                                        <div class="filter__form-text-input filter__form-text-input-small">
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="filter__form-input"
                                                value="$100.00"
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

                            <div class="filter__separate"></div>

                            <!-- Filter colums 3 -->
                            <div class="filter__col">
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
                                        <button class="form__tag">Lavazza</button>
                                        <button class="form__tag">Nescafe</button>
                                        <button class="form__tag">Starbucks</button>
                                    </div>
                                </div>
                            </div>
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
            </div>
        </div>
        <!-- List products -->
        <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
            <!-- Product card 1 -->
            <div class="col">
                <article class="product-card">
                    <div class="product-card__img-wrap">
                        <a href="<?php echo BASE_URL ?>/product_user/product_details">
                            <img src="<?php echo BASE_URL ?>/assets/img/product/item-1.png" alt="" class="product-card__thumb" />
                        </a>
                        <button class="like-btn product-card__like-btn">
                            <img src="<?php echo BASE_URL ?>/assets/icons/hearth.svg" alt="" class="like-btn__icon icon" />
                            <img src="<?php echo BASE_URL ?>/assets/icons/hearth-red.svg" alt="" class="like-btn__icon--liked" />
                        </button>
                    </div>
                    <h3 class="product-card__title">
                        <a href="<?php echo BASE_URL ?>/product_user/product_details">Coffee Beans - Espresso Arabica and Robusta Beans</a>
                    </h3>
                    <h4 class="product-card__brand">Lavazza</h4>
                    <div class="product-card__row">
                        <span class="product-card__price">$47.00</span>
                        <img src="<?php echo BASE_URL ?>/assets/icons/start.svg" alt="" class="product-card__start" />
                        <span class="product-card__score">4.3</span>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>

