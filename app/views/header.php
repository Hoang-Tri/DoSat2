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
            <a href="<?php echo BASE_URL?>/" class="logo top-bar__logo">
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
                        <a href="./" class="navbar__link"> Trang chủ </a>
                    </li>
                    <li class="navbar__item">
                        <a href="./#product" class="navbar__link">Sản phẩm </a>
                    </li>
                    <li class="navbar__item">
                        <a href="#!" class="navbar__link"> Thương hiệu </a>
                        <div class="navbar__sub-item">
                            <ul class="navbar__sub-list">
                                <li>
                                    <a href="<?php echo BASE_URL ?>/index/product" class="navbar__link navbar__sub-link">Lavazza</a>
                                </li>
                                <li>
                                    <a href="#!" class="navbar__link navbar__sub-link">Trung Nguyên</a>
                                </li>
                                <li>
                                    <a href="#!" class="navbar__link navbar__sub-link">Trần Quang</a>
                                </li>
                                <li>
                                    <a href="#!" class="navbar__link navbar__sub-link">Vina Cafe</a>
                                </li>
                                <li>
                                    <a href="#!" class="navbar__link navbar__sub-link">Phố</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="navbar__item">
                        <a href="#!" class="navbar__link">Về chúng tôi </a>
                    </li>
                </ul>
            </nav>

            <div class="navbar__overlay js-toggle" toggle-target="#navbar"></div>

            <!-- Actions -->
            <div class="top-act">
                <a href="<?php echo BASE_URL?>/index/sign_in" class="btn btn--text d-md-none">Đăng nhập</a>
                <a href="<?php echo BASE_URL?>/index/sign_up" class="btn btn--primary top-act__btn btn-not-margin"> Đăng kí</a>
            </div>
        </div>
    </div>
</header>
