<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_id = $user['acc_id'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
    $acc_img = isset($user['acc_img']) ? $user['acc_img'] : '';
    $acc_address = isset($user['acc_address']) ? $user['acc_address'] : 'Chưa đăng kí';
?>
<header class="header" id="header">
    <div class="container">
        <div class="top-bar">
            <!-- More -->
            <button class="top-bar__more d-none d-lg-block">
                <img
                    src="<?php echo BASE_URL?>/assets/icons/more.svg"
                    alt=""
                    class="top-bar__more-icon icon js-toggle"
                    toggle-target="#navbar"
                />
            </button>
            <!-- Logo -->
            <a href="<?php echo BASE_URL?>" class="logo top-bar__logo">
                <img src="<?php echo BASE_URL?>/assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__img" />
                <h1 class="logo__title top-bar__title">cafegrocery</h1>
            </a>

            <!-- NavBar -->
            <nav id="navbar" class="navbar hide">
                <button class="navbar__back js-toggle" toggle-target="#navbar">
                    <img src="<?php echo BASE_URL?>/assets/icons/arrow-left.svg" alt="" class="icon" />
                </button>

                <a href="#!" class="nav-btn d-none d-sm-flex">
                    <img src="<?php echo BASE_URL?>/assets/img/icon-navbar/buy.svg" alt="" class="icon" />
                    <span class="nav-btn__title">Cart</span>
                    <span class="nav-btn__qnt">3</span>
                </a>
                <a href="#!" class="nav-btn d-none d-sm-flex">
                    <img src="<?php echo BASE_URL?>/assets/icons/hearth.svg" alt="" class="icon" />
                    <span class="nav-btn__title">Private</span>
                    <span class="nav-btn__qnt">3</span>
                </a>

                <ul class="navbar__list js-dropdown-list">
                    <li class="navbar__item">
                        <a href="<?php echo BASE_URL ?>/index" class="navbar__link"> Trang chủ </a>
                    </li>
                    <li class="navbar__item">
                        <a href="<?php echo BASE_URL ?>/index#product" class="navbar__link">Sản phẩm </a>
                    </li>
                    <li class="navbar__item">
                        <a href="#!" class="navbar__link"> Thương hiệu </a>
                        <div class="navbar__sub-item">
                            <ul class="navbar__sub-list">
                                <?php 
                                foreach($brand as $key => $value) {
                                ?>
                                <li>
                                    <a href="<?php echo BASE_URL ?>/product_user/product_brand/<?php echo $value['brand_id']?>" class="navbar__link navbar__sub-link">
                                        <?php echo $value['brand_name'] ?>
                                    </a>
                                </li>

                                <?php 
                                } 
                                ?>
                            </ul>
                        </div>
                    </li>

                    <li class="navbar__item">
                        <a href="<?php echo BASE_URL ?>/post_user/allpost" class="navbar__link">Bài viết</a>
                        <div class="navbar__sub-item">
                            <ul class="navbar__sub-list">
                            <?php 
                                foreach($cate_post as $key => $value) {
                            ?>
                                <li>
                                    <a href="<?php echo BASE_URL ?>/post_user/post/<?php echo $value['cate_post_id']?>" class="navbar__link navbar__sub-link">
                                        <?php echo $value['cate_post_name'] ?>
                                    </a>
                                </li>

                            <?php 
                            } 
                            ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="navbar__overlay js-toggle" toggle-target="#navbar"></div>

            <!-- Actions -->
            <div class="top-act">
                <div class="top-act__group top-act__group-single">
                    <button class="top-act__btn js-toggle" toggle-target="#modal-search">
                        <img src="<?php echo BASE_URL ?>/assets/icons/search.svg" alt="" class="top-act__icon icon" />
                    </button>
                </div>

                <div class="top-act__group d-md-none">
                    <div class="top-act__btn-wrap top-act__favourite">
                        <button class="top-act__btn">
                            <img src="<?php echo BASE_URL ?>/assets/icons/hearth.svg" alt="" class="top-act__icon icon" />
                            <span class="top-act__title">03</span>
                        </button>

                        <!-- top action dropdown -->
                        <div class="dropdown-cart">
                            <div class="dropdown-cart__inner">
                                <img src="<?php echo BASE_URL ?>/assets/icons/dropdown-arrow.svg" alt="" class="dropdown-cart__img" />
                                <div class="dropdown-cart__row">
                                    <h2 class="dropdown-cart__heading">You have 3 item</h2>
                                    <a href="<?php echo BASE_URL ?>/favourite.html" class="dropdown-cart__view-all">See All</a>
                                </div>
                                <div class="dropdown-cart__wrap">
                                    <div class="row row-cols-3 gx-2">
                                        <!-- drop down item cart 1 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-1.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Lavazza Coffee Blends</h4>
                                                <span class="dropdown-cart__item-price"> $329.00</span>
                                            </article>
                                        </div>

                                        <!-- drop down item cart 2 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-2.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Coffee Beans Espresso</h4>
                                                <span class="dropdown-cart__item-price"> $39.99</span>
                                            </article>
                                        </div>

                                        <!-- drop down item cart 3 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-3.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Qualità Oro Mountain</h4>
                                                <span class="dropdown-cart__item-price">$47.00</span>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-cart__separate"></div>

                                <div class="dropdown-cart__checkout">
                                    <a href="<?php echo BASE_URL ?>/checkout.html" class="btn btn--primary btn--rounded">Check Out All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-act__separate"></div>
                    <div class="top-act__btn-wrap top-act__buy">
                        <button class="top-act__btn">
                            <img src="<?php echo BASE_URL ?>/assets/img/buy.svg" alt="" class="top-act__icon icon" />
                            <span class="top-act__title">$65.42</span>
                        </button>
                        <!-- top action dropdown -->
                        <div class="dropdown-cart">
                            <div class="dropdown-cart__inner">
                                <img src="<?php echo BASE_URL ?>/assets/icons/dropdown-arrow.svg" alt="" class="dropdown-cart__img" />
                                <div class="dropdown-cart__row">
                                    <h2 class="dropdown-cart__heading">You have 3 item</h2>
                                    <a href="<?php echo BASE_URL ?>/checkout.html" class="dropdown-cart__view-all">See All</a>
                                </div>
                                <div class="dropdown-cart__wrap">
                                    <div class="row row-cols-3 gx-2">
                                        <!-- drop down item cart 1 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-1.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Lavazza Coffee Blends</h4>
                                                <span class="dropdown-cart__item-price"> $329.00</span>
                                            </article>
                                        </div>

                                        <!-- drop down item cart 2 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-2.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Coffee Beans Espresso</h4>
                                                <span class="dropdown-cart__item-price"> $39.99</span>
                                            </article>
                                        </div>

                                        <!-- drop down item cart 3 -->
                                        <div class="col">
                                            <article class="dropdown-cart__item">
                                                <div class="dropdown-cart__thumb">
                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/product/item-3.png"
                                                        alt=""
                                                        class="dropdown-cart__thumb-img"
                                                    />
                                                </div>
                                                <h4 class="dropdown-cart__item-title">Qualità Oro Mountain</h4>
                                                <span class="dropdown-cart__item-price">$47.00</span>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-cart__bottom">
                                    <div class="dropdown-cart__row">
                                        <span class="dropdown-cart__label">Subtotal:</span>
                                        <span class="dropdown-cart__label">$415.99</span>
                                    </div>

                                    <div class="dropdown-cart__row">
                                        <span class="dropdown-cart__label">Texes:</span>
                                        <span class="dropdown-cart__label">Free</span>
                                    </div>

                                    <div class="dropdown-cart__row">
                                        <span class="dropdown-cart__label">Shipping:</span>
                                        <span class="dropdown-cart__label">$10.00</span>
                                    </div>

                                    <div class="dropdown-cart__row dropdown-cart__row--bold">
                                        <span class="dropdown-cart__label">Total Price:</span>
                                        <span class="dropdown-cart__label">$425.99</span>
                                    </div>
                                </div>

                                <div class="dropdown-cart__checkout">
                                    <a href="<?php echo BASE_URL ?>/checkout.html" class="btn btn--primary btn--rounded">Check Out All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="top-act__user">
                    <img src="<?php echo BASE_URL ?>/assets/uploads/avatar/<?php echo $acc_img ?>" alt="" class="top-act__avatar" />

                    <!-- top action dropdown user-->
                    <div class="top-act__dropdown">
                        <div class="dropdown-cart__inner">
                            <img
                                src="<?php echo BASE_URL ?>/assets/icons/dropdown-arrow.svg"
                                alt=""
                                class="dropdown-cart__img top-act__dropdown-arrow"
                            />

                            <div class="user-menu">
                                <div class="user-menu__wrap">
                                    <img src="<?php echo BASE_URL ?>/assets/uploads/avatar/<?php echo $acc_img ?>" alt="" class="user-menu__avatar" />
                                        <div>
                                            <h2 class="user-menu__name"><?php echo $acc_name ?></h2>
                                            <p class="user-menu__username"><?php echo $acc_email ?></p>
                                        </div>
                                </div>

                                <ul class="user-menu__list">
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/profile_user" class="user-menu__link">Thông tin cá nhân</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo BASE_URL ?>/favourite.html" class="user-menu__link">Sản phẩm yêu thích</a>
                                    </li>

                                    <li class="user-menu__separate">
                                        <a href="#!" class="user-menu__link" id="switch-theme-btn">
                                            <span>Dark mode</span>
                                            <img src="<?php echo BASE_URL ?>/assets/icons/light.svg" alt="" class="user-menu__icon icon" />
                                        </a>
                                    </li>

                                    <li class="user-menu__separate">
                                        <a href="<?php echo BASE_URL ?>/account_user/logout" class="user-menu__link">
                                            Đăng xuất
                                            <img src="<?php echo BASE_URL ?>/assets/icons/logout.svg" alt="" class="user-menu__icon icon" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal__search hide" id="modal-search">
        <div class="modal__inner">
            <span class="form__close js-toggle" toggle-target="#modal-search">&times</span>
            <form action="" class="form">
                <div class="form__group">
                    <label for="search" class="form__label">Search</label>
                    <div class="form__text-input form__text-input--small">
                        <input
                            type="text"
                            id="search"
                            name="search"
                            rules="required"
                            placeholder="Enter product or category"
                            class="form__input modal__search-input"
                            required
                        />
                        <img
                            src="<?php echo BASE_URL ?>/assets/icons/search.svg"
                            alt=""
                            class="form__input-icon form__icon icon modal__search-icon"
                        />
                    </div>
                    <span class="form__message"></span>
                </div>
            </form>

            <ul class="modal__search-list">
                <li>
                    <a href="#!" class="modal__search-link">ffffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">fffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">fffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">fffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">fffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">ffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">fffffffffffff</a>
                </li>
                <li>
                    <a href="#!" class="modal__search-link">sssssssssssssss</a>
                </li>
            </ul>
        </div>

        <div class="modal__opacity js-toggle" toggle-target="#modal-search"></div>
    </div>
</header>
