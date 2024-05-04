<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
?>


<main class="profile">
    <div class="container">
        <!-- Search -->
        <div class="profile__container">
            <div class="search d-none d-md-flex">
                <input type="text" name="" placeholder="Search for item" id="" class="search__input" />
                <button class="search__btn">
                    <img src="<?php echo BASE_URL ?>/assets/icons/search.svg" alt="" class="search__icon icon" />
                </button>
            </div>
        </div>

        <div class="profile__container">
            <div class="row gy-3">
                <div class="col-3 col-xl-4 col-lg-5 col-md-12">
                    <aside class="profile__sidebar">
                        <div class="profile__user">
                            <img src="<?php echo BASE_URL ?>/assets/img/avatar/avatar-1.png" alt="" class="profile__user-avatar" />
                            <h1 class="profile__user-name"><?php echo $acc_name ?></h1>
                            <p class="profile__user-desc">Registered: 17th May 2022</p>
                        </div>

                        <!-- Menu 1 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">Quản lí tài khoản</h3>
                            <ul class="profile__menu-list">
                                <li>
                                    <a href="<?php echo BASE_URL ?>/profile_user/edit_profile" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/profile.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Thông tin cá nhân
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo BASE_URL ?>/shipping.html" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/location.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Addresses
                                    </a>
                                </li>

                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/message.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Communications & privacy
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 2 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">My items</h3>
                            <ul class="profile__menu-list">
                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/download.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Reorder
                                    </a>
                                </li>

                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/hearth.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Lists
                                    </a>
                                </li>

                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/gift-2.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Registries
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 3 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">Subscriptions & plans</h3>
                            <ul class="profile__menu-list">
                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/protected.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Protection plans
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Menu 4 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">Customer Service</h3>
                            <ul class="profile__menu-list">
                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/help.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Help
                                    </a>
                                </li>

                                <li>
                                    <a href="#!" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/dange-info.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Terms of Use
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-9 col-xl-8 col-lg-7 col-md-12">
                    <div class="cart">
                        <div class="row gy-3">
                            <!-- My wallet -->
                            <div class="col-12">
                                <h2 class="cart__heading">My Wallet</h2>
                                <p class="cart__desc payment-card__desc">Payment methods</p>

                                <div class="payment-card__list">
                                    <div class="row row-cols-3 row-cols-xl-2 row-cols-lg-1">
                                        <div class="col">
                                            <article
                                                class="payment-card__item"
                                                style="--payment-card-bg: #1e2e69"
                                            >
                                                <div class="payment-card__top">
                                                    <img src="<?php echo BASE_URL ?>/assets/img/payment-card/plane.svg" alt="" />
                                                    <p class="payment-card__title">FeatherCard</p>
                                                </div>

                                                <span class="payment-card__number">1234 4567 8901 2221</span>

                                                <div class="payment-card__bottom">
                                                    <div class="payment-card__info">
                                                        <div class="payment-card__wrap">
                                                            <span class="payment-card__name">Card Holder</span>
                                                            <span class="payment-card__value">Imran Khan</span>
                                                        </div>

                                                        <div class="payment-card__wrap">
                                                            <span class="payment-card__name">Expired</span>
                                                            <span class="payment-card__value">10/22</span>
                                                        </div>
                                                    </div>

                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/payment-card/payment-card-icon.svg"
                                                        alt=""
                                                        class="payment-card__icon"
                                                    />
                                                </div>
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/payment-card/plane-bg.png"
                                                    alt=""
                                                    class="payment-card__bg"
                                                />
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article
                                                class="payment-card__item"
                                                style="--payment-card-bg: #354151"
                                            >
                                                <div class="payment-card__top">
                                                    <img src="<?php echo BASE_URL ?>/assets/img/payment-card/leaf.svg" alt="" />
                                                    <p class="payment-card__title">FeatherCard</p>
                                                </div>

                                                <span class="payment-card__number">2221 4567 8901 3544</span>

                                                <div class="payment-card__bottom">
                                                    <div class="payment-card__info">
                                                        <div class="payment-card__wrap">
                                                            <span class="payment-card__name">Card Holder</span>
                                                            <span class="payment-card__value">Tfeww</span>
                                                        </div>

                                                        <div class="payment-card__wrap">
                                                            <span class="payment-card__name">Expired</span>
                                                            <span class="payment-card__value">12/22</span>
                                                        </div>
                                                    </div>

                                                    <img
                                                        src="<?php echo BASE_URL ?>/assets/img/payment-card/payment-card-icon.svg"
                                                        alt=""
                                                        class="payment-card__icon"
                                                    />
                                                </div>
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/payment-card/leaf-bg.png"
                                                    alt=""
                                                    class="payment-card__bg"
                                                />
                                            </article>
                                        </div>
                                        <div class="col">
                                            <a href="<?php echo BASE_URL ?>/add-new-card.html" class="payment-card__new">
                                                <img src="<?php echo BASE_URL ?>/assets/icons/plus.svg" alt="" class="icon" />
                                                <p class="payment-card__new-desc">Add New Card</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Account info -->
                            <div class="col-12">
                                <h2 class="cart__heading">Account info</h2>
                                <p class="cart__desc payment-card__desc">
                                    Addresses, contact information and password
                                </p>

                                <div class="row row-cols-2 row-cols-lg-1">
                                    <div class="col">
                                        <a href="<?php echo BASE_URL ?>/profile_user/edit_profile">
                                            <article class="account-info">
                                                <div class="account-info__icon">
                                                    <img src="<?php echo BASE_URL ?>/assets/icons/message.svg" alt="" class="icon" />
                                                </div>
                                                <div class="account-info__content">
                                                    <h3 class="account-info__title">Địa chỉ email</h3>
                                                    <p class="account-info__desc"><?php echo $acc_email ?></p>
                                                </div>
                                            </article>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="<?php echo BASE_URL ?>/profile_user/edit_profile">
                                            <article class="account-info">
                                                <div class="account-info__icon">
                                                    <img src="<?php echo BASE_URL ?>/assets/icons/phone.svg" alt="" class="icon" />
                                                </div>
                                                <div class="account-info__content">
                                                    <h3 class="account-info__title">Số điện thoại</h3>
                                                    <p class="account-info__desc"><?php echo $acc_phone ?></p>
                                                </div>
                                            </article>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile list product  -->
                            <div class="col-12">
                                <h2 class="cart__heading">Lists</h2>
                                <p class="cart__desc payment-card__desc">2 items - Primary</p>

                                <div class="favourite">
                                    <article class="favourite__item">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/img/product/item-1.png"
                                            alt=""
                                            class="favourite__img"
                                        />

                                        <div class="favourite__info">
                                            <h3 class="favourite__info-title">
                                                Coffee Beans - Espresso Arabica and Robusta Beans
                                            </h3>

                                            <div class="favourite__bottom">
                                                <span class="favourite__price">$53.00</span>
                                                <button class="btn btn--primary btn--rounded">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </article>

                                    <div class="separate" style="--margin: 20px"></div>

                                    <article class="favourite__item">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/img/product/item-2.png"
                                            alt=""
                                            class="favourite__img"
                                        />

                                        <div class="favourite__info">
                                            <h3 class="favourite__info-title">
                                                Lavazza Coffee Blends - Try the Italian Espresso
                                            </h3>

                                            <div class="favourite__bottom">
                                                <span class="favourite__price">$47.00</span>
                                                <button class="btn btn--primary btn--rounded">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

