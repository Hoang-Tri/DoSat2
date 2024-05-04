<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_id = $user['acc_id'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
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

                <!-- Sidebar -->
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

                <!-- Right -->
                <div class="col-9 col-xl-8 col-lg-12">
                    <div class="cart">
                        <div class="row gy-3">
                            <div class="col-12">
                                <a href="<?php echo BASE_URL ?>/profile_user" class="form-card__top">
                                    <img src="<?php echo BASE_URL ?>/assets/icons/arrow-left.svg" alt="" class="icon" />
                                    <h2 class="cart__heading cart__sub-heading-lv2">Hoàn tất thông tin cá nhân</h2>
                                </a>

                                <form method="post" action="<?php echo BASE_URL ?>/profile_user/update_profile" id="form-card" class="form form-card">
                                    <!-- form row 1  -->
                                    <div class="form__row form-card__row">
                                        <div class="form__group">
                                            <label for="full-name" class="form__label form-card__label"
                                                >Họ và tên</label
                                            >
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    id="full-name"
                                                    name="acc_name"
                                                    rules="required"
                                                    placeholder="Họ và tên"
                                                    value= <?php echo $acc_name?> 
                                                    class="form__input"
                                                    required
                                                />
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>

                                        <div class="form__group">
                                            <label for="email" class="form__label form-card__label"
                                                >Địa chỉ email</label
                                            >
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    id="email"
                                                    name="acc_email"
                                                    rules="required|email"
                                                    value=<?php echo $acc_email ?>
                                                    placeholder="Email"
                                                    class="form__input"
                                                    required
                                                />
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>
                                    </div>

                                    <!-- form row 2  -->
                                    <div class="form__row form-card__row">
                                        <div class="form__group">
                                            <label for="phone-number" class="form__label form-card__label"
                                                >Số điện thoại</label
                                            >
                                            <div class="form__text-input">
                                                <input
                                                    type="tel"
                                                    id="phone-number"
                                                    name="acc_phone"
                                                    rules="required|min:11"
                                                    placeholder="Số điện thoại"
                                                    class="form__input"
                                                    required
                                                />
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>
                                    </div>

                                    <div class="form-card__bottom">
                                        <a href="<?php echo BASE_URL ?>/profile_user" class="btn btn--text form-card__btn">Huỷ</a>
                                        <button
                                            class="btn btn--primary btn--rounded form__submit-btn form-card__btn"
                                        >
                                            Cập nhật
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>