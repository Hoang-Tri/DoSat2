<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_id = $user['acc_id'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
    $acc_img = isset($user['acc_img']) ? $user['acc_img'] : '';
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
                            <img src="<?php echo BASE_URL ?>/assets/uploads/avatar/<?php echo $acc_img ?>" alt="" class="profile__user-avatar" />
                            <h1 class="profile__user-name"><?php echo $acc_name ?></h1>
                            <!-- <p class="profile__user-desc">Registered: 17th May 2022</p> -->
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
                                    <a href="<?php echo BASE_URL ?>/order_user/list_order" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/document.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Đơn hàng của tôi
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 2 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">Danh sách của tôi</h3>
                            <ul class="profile__menu-list">
                                <li>
                                    <a href="<?php echo BASE_URL ?>/favorite_user" class="profile__menu-link">
                                        <span class="profile__menu-thumb">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/hearth.svg"
                                                alt=""
                                                class="icon profile__menu-icon"
                                            />
                                        </span>
                                        Yêu thích
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
                                        Voucher
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Menu 4 -->
                        <div class="profile__menu">
                            <h3 class="profile__menu-title">Dịch vụ khách hàng</h3>
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
                                        Trợ giúp
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
                                        Điều khoản sữ dụng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>