<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_id = $user['acc_id'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
    $acc_img = isset($user['acc_img']) ? $user['acc_img'] : '';
    $acc_address = isset($user['acc_address']) ? $user['acc_address'] : 'Chưa đăng kí';
?>
                <div class="col-9 col-xl-8 col-lg-7 col-md-12">
                    <div class="cart">
                        <div class="row gy-3">
                            <!-- Account info -->
                            <div class="col-12">
                                <h2 class="cart__heading">Thông tin tài khoản</h2>
                                <p class="cart__desc payment-card__desc">
                                    Địa chỉ và thông tin liên hệ
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

